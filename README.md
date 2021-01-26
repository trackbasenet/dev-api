# TrackBase Developers API Library

TrackBase is hosting own APIs for developers amongst its users and for clans that want to depict TrackBase data in their very own way without having to use iframes or such.
Users that have registered on the [Developers Platform](https://developers.trackbase.net) could already query our several APIs in any programming language they like, or through standard cURL requests. With this package, TrackBase wants to give an easier entry into gathering information from its servers, without the need of knowing how to code. All it takes for a standard request to our API is **two lines of code**.

Please make sure that you are [registered as a developer](https://developers.trackbase.net/signup) in the first place and read through our [API docs](https://developers.trackbase.net/apis) for a better idea of how we are returning information and what parameters you need to supply. Additionally, and most importantly, check out the **How To Use** section in this document further down.

## Installation

### Composer

The recommended path to installing and using our library is to use [Composer](https://getcomposer.org).

Execute the following line of code in your terminal to install our library into your project:

```sh
composer require trackbasenet/dev-api
```

Alternatively you can also add our library to your project through the `composer.json` file like so:

```json
{
	"require": {
		"trackbasenet/dev-api": "*"
	}
}
```

Eventually you would want to install our library through the following line executed in your terminal:

```sh
composer install
```

### ZIP Download

If you are unfamiliar with or do not want to use Composer, you could also download the [latest ZIP archive](https://github.com/trackbasenet/dev-api/archive/master.zip) and include the `src/autoload.php` file. This bypasses the version system and downloads the code up to the **latest** commit.

Eventually you will need to `require_once` the autoloader like this:

```php
require_once __DIR__ . '/src/autoload.php';
```

## How To Use

## Instantiation

Before running any methods, you will need to instantiate the `TrackBaseApi` class and supply the necessary credentials that are required to query our APIs.

```php
<?php

$options = [
	'game' => 'et'
];

$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak, $options);
```

While `$options` currently only supports setting a game, to which you want to make query requests. Currently, only `et` is available. This means, you do not need to supply the `$options` array.

## Available Methods

After you have instantiated your `TrackBaseApi` class, you can run any supported method directly on this object.
Following methods are supported:

- [ranklist (Rankings API)](#ranklist)
- [toplist (Rankings API)](#toplist)
- [clanRanklist (Rankings API)](#clanRanklist)
- [clanToplist (Rankings API)](#clanToplist)
- [playerInfo (Players API)](#playerInfo)
- [playerServers (Players API)](#playerServers)
- [playerSessions (Players API)](#playerSessions)
- [clanInfo (Clans API)](#clanInfo)
- [serverInfo (Servers API)](#serverInfo)
- [serverSessions (Servers API)](#serverSessions)
- [serverUsage (Servers API)](#serverUsage)
- [userInfo (Users API)](#userInfo)
- [getUser (Users API)](#getUser)
- [connectUser (Users API)](#connectUser)
- [collectNewUser (Users API)](#collectNewUser)

### ranklist

```php
/*
 * Available options, specifically for this method:
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'order' => 'asc',
	'limit' => 10,
	'start' => 1
];

$api->ranklist($options);
```

### toplist

```php
/*
 * Available options, specifically for this method:
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'order' => 'asc',
	'limit' => 10,
	'start' => 1
];

$api->toplist($options);
```

### clanRanklist

```php
/*
 * Available options, specifically for this method:
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'order' => 'asc',
	'limit' => 10,
	'start' => 1
];

$api->clanRanklist($options);
```

### clanToplist

```php
/*
 * Available options, specifically for this method:
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'order' => 'asc',
	'limit' => 10,
	'start' => 1
];

$api->clanToplist($options);
```

### playerInfo

```php
/*
 * Available options, specifically for this method:
 * pid: any integer greater than 0 that corresponds to a player's ID
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'pid' => 1,
	'order' => 'asc',
	'limit' => 10,
	'start' => 1
];

$api->playerInfo($options);
```

### playerServers

```php
/*
 * Available options, specifically for this method:
 * pid: any integer greater than 0 that corresponds to a player's ID
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'pid' => 1,
	'order' => 'asc',
	'limit' => 10,
	'start' => 1
];

$api->playerServers($options);
```

### playerSessions

```php
/*
 * Available options, specifically for this method:
 * pid: any integer greater than 0 that corresponds to a player's ID
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'pid' => 1,
	'order' => 'asc',
	'limit' => 10,
	'start' => 1
];

$api->playerSessions($options);
```

### clanInfo

```php
/*
 * Available options, specifically for this method:
 * cid: any integer greater than 0 that corresponds to a clan's ID
 * order: 'asc' or 'desc'
 */

// Following options are default and do not need to be supplied by default
$options = [
	'cid' => 1,
	'order' => 'asc',
];

$api->clanInfo($options);
```

### serverInfo

```php
/*
 * Available options, specifically for this method:
 * sid: any integer greater than 0 that corresponds to a server's ID
 * order-by: one of the following: ['xp', 'rate', 'rating', 'ping', 'class', 'kills', 'deaths', 'playername']
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'sid' => 1,
	'order-by' => 'rate',
	'order' => 'desc',
	'limit' => 10,
	'start' => 1
];

$api->serverInfo($options);
```

### serverSessions

```php
/*
 * Available options, specifically for this method:
 * sid: any integer greater than 0 that corresponds to a server's ID
 * order-by: 'time'
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'sid' => 1,
	'order-by' => 'time',
	'order' => 'desc',
	'limit' => 10,
	'start' => 1
];

$api->serverSessions($options);
```

### serverUsage

```php
/*
 * Available options, specifically for this method:
 * sid: any integer greater than 0 that corresponds to a server's ID
 * order-by: one of the following: ['playername', 'rate', 'rating', 'time', 'ratetime', 'lastseen']
 * order: 'asc' or 'desc'
 * limit: any integer between 1 and 50
 * start: any integer greater than 0, useful for pagination
 */

// Following options are default and do not need to be supplied by default
$options = [
	'sid' => 1,
	'order-by' => 'rate',
	'order' => 'desc',
	'limit' => 10,
	'start' => 1
];

$api->serverUsage($options);
```

### userInfo

```php
/*
 * Available options, specifically for this method:
 * uid: any integer greater than 0 that corresponds to a user's ID
 * request: binary request number that translates to the information that should be received. For more information, please check the documentation / your app on our developers platform
 */

// Following options are default and do not need to be supplied by default
$options = [
	'uid' => 0,
	'request' => 0
];

$api->userInfo($options);
```

### getUser

```php
// This method is a shortcut for the ->userInfo() method and receives the $user_id and $request integers as its arguments
$api->getUser($user_id, $request);
```

### connectUser

```php
// This method can be called when you want to connect a user to your app. It returns a redirection header to our developers platform.
$api->connectUser();
```

### collectNewUser

```php
// This method needs to be called on the URI that has been submitted as your "Server URL" in your app settings. It holds the logic for fetching a user in the correct way. It requires your apps $returnToken as well as a return method that will be called once your site registers a new call from TrackBase with a new user ID. The $user_id will be its only parameter.
$possible_new_user_id = $api->collectNewUser($returnToken, function ($user_id) {
// Any logic to store the user ID
// This can either be a database call inside this method,
// or return the user ID itself. If so, you might want to catch this methods return inside a new variable ($possible_new_user_id)
});
```

## Global Methods

Some methods are global and can be called on any api method.

- [countResults](#countResults)
- [firstResult](#firstResult)
- [getResults](#getResults)
- [getStatusCode](#getStatusCode)
- [getMessage](#getMessage)
- [getError](#getError)
- [getErrorCode](#getErrorCode)
- [hasErrors](#hasErrors)

### countResults

This method returns the amount of rows being returned. In some cases this might not be the expected figure. For more details, please check the API docs.

```php
$topTenPlayers_count = $api->ranklist()->countResults();
```

### firstResult

This method returns the first result of the result set. If there are no results, or the query returned an error, `NULL` will be returned.

```php
$topPlayer = $api->ranklist()->firstResult();
```

### getResults

This method returns the whole result set. If there are no results, or the query returned an error, an empty `[]` array will be returned.

```php
$topTenPlayers = $api->ranklist()->getResults();
```

### getStatusCode

This method returns the status code that is returned with any query. `200` signals a good query.

```php
$requestStatusCode = $api->ranklist()->getStatusCode();
```

### getMessage

This method returns the message that is returned with any query. It will be empty if there are errors returned.

```php
$requestMessage = $api->ranklist()->getMessage();
```

### getError

This method returns the error message that is returned with any query. It will be empty if there are no errors returned.

```php
$requestErrorMessage = $api->ranklist()->getError();
``` 

### getErrorCode

This method returns the error code. This is extremely helpful for debugging purposes or when contacting us with an issue. For more details check the `[getError](#getError)` method.

```php
$requestErrorCode = $api->ranklist()->getErrorCode();
```

### hasErrors

This method returns whether or not errors were returned. It can be used to see easily if the query was successful. For further checks you might want to use the `[countResults](#countResults)` method.

```php
$hasErrors = $api->ranklist()->hasErrors();

if ($hasErrors) {
	// Show errors
}
```

## Examples

### Receiving the TOP 10 players of the TSP ranklist

```php
$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak, ['game' => 'et']);

$results = $api->ranklist(['order' => 'asc', 'limit' => 10, 'start' => 1])->getResults();
```

or quicker:

```php
$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak);

$results = $api->ranklist()->getResults();
```

### Receiving the last 5 sessions played on a server

```php
$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak);

$results = $api->serverSessions(['limit' => 5])->getResults();
```

### Receiving and showing a specific player name in HTML format

```php
$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak);

$player = $api->playerInfo(['pid' => 1234])->firstResult();

echo "Hello, {$player->playername_html}!";
```

### Listening on TrackBase return calls with new user information

```php
$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak);

$api->collectNewUser($returnToken, function ($user_id) use ($database) {
	$database->insertRow('users_table', ['trackbase_userid' => $user_id]);
});
```

### Fetching user information

```php
$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak);

// Get the user's username
$api->userInfo([
	'uid' => $user_id,
	'request' => 1
]);
```

or quicker:

```php
$api = new \TrackBaseNet\TrackBaseApi($app_id, $relation_token, $_aak);

// Get the user's username
$api->getUser($user_id, 1);
```

## Support

If you have questions or found an issue regarding this library, feel free to [open an issue](https://github.com/trackbasenet/dev-api/issues/new), visit our [forums](https://forum.trackbase.net/), join our [Discord server](https://discord.gg/JFzd8hH) or [write us an email](https://forum.trackbase.net/sendmessage.php). Thank you for your help!

## Donating

If you value our work and want to help paying our servers, [please consider donating](https://et.trackbase.net/donate). You will receive a nice gift from us in return!