<?php
$email = 'your@mail.com';
$subject = 'your email subject';
$html = "<html><body>";
$formdata = json_decode($formdata);
foreach($formdata as $field) {
    switch($field->name) {
        case 'email':
        case 'name':
        case 'tel':
            $html .= "<p>" . $field->name . ": " . $sanitizer->text($field->value) . "</p>";
            if($field->name == 'email') $email = $sanitizer->email($field->value);
            break;
        case 'message':
            $html .= "<p>" . $field->name . ":<br>---<br>" . nl2br($sanitizer->textarea($field->value)) . "<br>---</p>";
            //${$field->name} = $sanitizer->textarea($field->value);
            break;
        case 'mail':
            // honeypot
            if($field->value) $subject = 'SPAM: '.$subject;
            break;
    }
}
$html .= "</body></html>";

$mail = wireMail();
$mail->to('your@mail.com')->from($email);
$mail->subject($subject);
$mail->bodyHTML($html);
if($mail->send()) { ?>
    <div class="uk-alert uk-alert-success uk-alert-large">
        <p>Thank you!</p>
    </div>
<?php
}
else { ?>
    <div class="uk-alert uk-alert-danger uk-alert-large">
        <p>Error!</p>
    </div>
<?php
}

// save to log that can be viewed via the pw backend
$p = new Page();
$p->template = 'maillogitem';
$p->parent = 1234;
$p->title = date('d.m.Y') . ' - ' . $email;
$p->body = $html;
$p->save();