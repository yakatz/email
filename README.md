# Email Module For Kohana 3.x

Factory-based email class. This class is a simple wrapper around [Swiftmailer](http://github.com/swiftmailer/swiftmailer).

## Usage

Create new messages using the `Email::factory($subject, $message)` method. Add recipients, add sender, send message:

    $email = Email::factory('Hello, World', 'This is my body, it is nice.')
        ->to('person@example.com')
        ->from('you@example.com', 'My Name')
        ->send()
        ;

You can also add HTML to your message:

    $email->message('<p>This is <em>my</em> body, it is <strong>nice</strong>.</p>', 'text/html');

Additional recipients can be added using the `to()`, `cc()`, and `bcc()` methods.

Additional senders can be added using the `from()` and `reply_to()` methods. If multiple sender addresses are specified, you need to set the actual sender of the message using the `sender()` method. Set the bounce recipient by using the `return_path()` method.

To access and modify the [Swiftmailer message](http://swiftmailer.org/docs/messages) directly, use the `raw_message()` method.

### Message Part Order

Due to a [bug](https://github.com/swiftmailer/swiftmailer/issues/184#issuecomment-5198845) in SwiftMailer, a message with HTML and plain text must have the HTML set first.
As of `kohana-swiftmailer` version `1.1`, `message()` defaults to `text/html`. We are looking for a more flexible solution.

## Configuration

Configuration is stored in `config/email.php`. Options are dependant upon transport method used. Consult the Swiftmailer documentation for options available to each transport.
