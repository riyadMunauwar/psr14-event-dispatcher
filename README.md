Here’s a detailed **`README.md`** file for your PSR-14 Event Dispatcher package. This document includes installation instructions, usage examples, and contribution guidelines.

---

# PSR-14 Event Dispatcher

A simple and flexible implementation of the **PSR-14** Event Dispatcher interface. This library allows you to create and manage events and their listeners, providing an easy way to implement the observer pattern in your applications.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
  - [Basic Example](#basic-example)
  - [Removing Listeners](#removing-listeners)
- [Testing](#testing)
- [Contribution](#contribution)
- [License](#license)

## Features

- **PSR-14 Compliant**: Follows the PSR-14 Event Dispatcher standards for interoperability.
- **Easy Listener Management**: Add, dispatch, and remove listeners with ease.
- **Lightweight**: Minimalistic design with no external dependencies.

## Installation

You can install this package using Composer. Run the following command in your terminal:

```bash
composer require riyad/psr14-event-dispatcher
```

## Usage

### Basic Example

To get started, you can create an instance of the `EventDispatcher`, add listeners, and dispatch events as shown below:

```php
use Psr14EventDispatcher\Event;
use Psr14EventDispatcher\EventDispatcher;

$eventDispatcher = new EventDispatcher();

// Define a listener
$eventDispatcher->addListener('my.event', function(Event $event) {
    echo "Event: " . $event->getName() . " was dispatched!";
});

// Create and dispatch an event
$event = new Event('my.event');
$eventDispatcher->dispatch($event);
```

In this example, when the event `my.event` is dispatched, the listener will be called, and the output will be:

```
Event: my.event was dispatched!
```

### Removing Listeners

You can also remove listeners if you no longer need them:

```php
$listener = function(Event $event) {
    echo "This won't be called.";
};

$eventDispatcher->addListener('my.event', $listener);

// Remove the listener
$eventDispatcher->removeListener('my.event', $listener);

// Dispatch the event
$eventDispatcher->dispatch(new Event('my.event'));
```

In this case, the output will be empty since the listener was removed before dispatching the event.

## Testing

This package includes tests using PHPUnit. To run the tests, ensure you have PHPUnit installed, then run the following command:

```bash
vendor/bin/phpunit tests/EventDispatcherTest.php
```

You should see output indicating that the tests have passed successfully.

## Contribution

Contributions are welcome! If you have suggestions for improvements or new features, feel free to open an issue or submit a pull request. 

### How to Contribute

1. Fork the repository.
2. Create a new branch for your feature or bugfix:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Make your changes and commit them:
   ```bash
   git commit -m "Add your message here"
   ```
4. Push to the branch:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Open a pull request.

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

---

Feel free to modify any sections or add more details as needed! Let me know if there's anything else you'd like to include.