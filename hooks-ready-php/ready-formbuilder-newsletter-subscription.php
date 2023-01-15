<?php namespace ProcessWire;

if (!defined("PROCESSWIRE")) {
    die();
}

/** @var ProcessWire $wire */

// NEWSLETTER FORM VIA FORMBUILDER
// https://processwire.com/talk/topic/23096-how-to-auto-subscribe-to-a-pm%C2%A0list-an-user-that-submits-a-fb-form/?do=findComment&comment=197717
$wire->addHookAfter('FormBuilderProcessor::formSubmitSuccess', function ($event) {
    // $listId = 1; // ID of the ProMailer list you want to add them to
    $confirmed = false; // set to false if you want to send them confirm email

    $form = $event->arguments(0); // InputfieldForm
    if ($form->name != 'newsletter') {
        return;
    }

    // need an email to add to ProMailer list
    $email = $form->getChildByName('e_mail')->val();
    if (!$email) {
        return;
    }

    // we need a list
    $listId = $form->getChildByName('list_id')->val();
    if (!$listId) {
        return;
    }

    // custom data
    $data = [
        // any custom fields you are storing in ProMailer subscriber
        // 'first_name' => $form->getChildByName('first_name')->val(),
        // 'topics' => $form->getChildByName('topics')->val(),
        'privacy' => $form->getChildByName('privacy')->val(),
        // 'einzugsbereich' => $form->getChildByName('einzugsbereich')->val(),
    ];

    $promailer = $event->modules->getModule('ProMailer');

    wire()->log->save('newsletterdebug', $email);

    foreach ($listId as $li) {
        wire()->log->save('newsletterdebug', $li);
        // $subscriber = $promailer->subscribers->add($email, $li, $confirmed);
        $subscriber = $promailer->subscribers->add($email, $li, $confirmed, $data);

        if (!$subscriber) {
            // failed to add subscriber
        } elseif (is_int($subscriber)) {
            // email is already subscribed to this list
        } else {
            // success: $subscriber is a ProMailerSubscriber object that was
            // either just added or has not yet clicked link in confirm email
            if (!$confirmed) {
                // send them a confirmation/opt-in email

                // optionally make the email body as you want it
                $bodyText = "Bitte bestätigen Sie Ihre Anmeldung zum Newsletter {list}:\n\n{url}\n\nSchwimmschule Wendel\nHauke Wendel\nGablonzer Weg 1\n25524 Itzehoe\n\nTelefon: 04821 / 1489744\nE-Mail: info@schwimmschule-wendel.de";
                $bodyHTML = "<html><body><p>Nur noch einen <a href='{url}'>Klick zur Bestätigung</a> Ihrer Anmeldung zum <strong>{list}</strong> Newsletter.</p><p><strong>Schwimmschule Wendel</strong><br>Hauke Wendel<br>Gablonzer Weg 1<br>25524 Itzehoe<br><br>Telefon: 04821 / 1489744<br>E-Mail: info@schwimmschule-wendel.de</p></body></html>";

                // <<< _OUT
                //     <html><body>
                //         <p>Nur noch einen <a href='{url}'>Klick zur Bestätigung</a> Ihrer Anmeldung zum <strong>{list}</strong> Newsletter.</p>
                //         <p><strong>Schwimmschule Wendel</strong><br>Hauke Wendel<br>Gablonzer Weg 1<br>25524 Itzehoe<br><br>Telefon: 04821 / 1489744<br>E-Mail: info@schwimmschule-wendel.de</p>
                //     </body></html>
                // _OUT;

                // https://processwire.com/talk/topic/21478-how-can-i-send-a-second-confirmation-mail-when-user-has-opted-in/?do=findComment&comment=185472
                $promailer->subscribers->sendConfirmEmail($subscriber, [
                    'subject' => '{list} - Newsletteranmeldung bestätigen',
                    'body' => $bodyText,
                    'bodyHTML' => $bodyHTML,
                ]);
            }
        }
    }
});
