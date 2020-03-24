Please see [this repo](https://github.com/laravel-notification-channels/channels) for instructions on how to submit a channel proposal.

# A Boilerplate repo for contributions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-notification-channels/hangouts-chat.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/hangouts-chat)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/laravel-notification-channels/hangouts-chat/master.svg?style=flat-square)](https://travis-ci.org/laravel-notification-channels/hangouts-chat)
[![StyleCI](https://styleci.io/repos/:249778594/shield)](https://styleci.io/repos/:249778594)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/39bcd940-8051-49cd-880b-a214d8e3622e.svg?style=flat-square)](https://insight.sensiolabs.com/projects/39bcd940-8051-49cd-880b-a214d8e3622e)
[![Quality Score](https://img.shields.io/scrutinizer/g/laravel-notification-channels/hangouts-chat.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-notification-channels/hangouts-chat)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/laravel-notification-channels/hangouts-chat/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-notification-channels/hangouts-chat/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-notification-channels/hangouts-chat.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/hangouts-chat)

This package makes it easy to send notifications using [Google Hangouts Chat](https://gsuite.google.com/products/chat/) with Laravel 5.5+, 6.x and 7.x

## Contents

- [Installation](#installation)
	- [Setting up the Google Hangouts Chat service](#setting-up-the-google-hangouts-chat-service)
- [Usage](#usage)
	- [Available Message methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

Please also include the steps for any third-party service setup that's required for this package.

### Setting up the Google Hangouts Chat service

In order to send messages using bots, you need to [setup a service account](https://developers.google.com/hangouts/chat/how-tos/service-accounts) and [activate your bot](https://developers.google.com/hangouts/chat/how-tos/bots-publish).
Remeber to save the private key in a safe place.

## Usage

You can use the channel in your `via()` method inside the notification:

```php
use Illuminate\Notifications\Notification;
use NotificationChannels\GoogleHangouts\GoogleHangoutsChatMessage;

class TaskCompleted extends Notification
{
    public function via($notifiable)
    {
        return [GoogleHangoutsChat::class];
    }

    public function toHangoutsChat($notifiable)
    {
        return GoogleHangoutsChatMessage::create("Task #{$notifiable->id} is complete!")
            ->room('room_id');
    }
}
```

### Available Message methods

A list of all available options

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email renan@4success.com.br instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Renan William Alves de Paula](https://github.com/renanwilliam)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
