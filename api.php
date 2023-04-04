<?php namespace ProcessWire;

if ($config->ajax) {

    $data = json_decode(file_get_contents('php://input'), true);
    $status = "Ok!";
    // $message = "Looks good to me!";

    $name = $sanitizer->text($data["name"]);
    $email = $sanitizer->text($data["email"]);
    $message = $sanitizer->text($data["message"]);

    $newpage = new Page();

    $newpage->setOutputFormatting(false);

    $newpage->template = 'basic-page';

    $newpage->parent = wire('pages')->get(1015);

    $newpage->name = $name . " - " . time();

    $newpage->title = time() . " - " . $email;

    // $newpage->fieldname = "my field value";

    $newpage->save();

    return json_encode(array("status" => $status, "name" => $name, "email" => $email, "message" => $message));
    $this->halt();

    // return json_encode($res);
    // var_dump($data);

    // $key = "NStLPpZ*WmSHB9SUF6f$@$7";

    //
    // $headers = getallheaders();
    // var_dump($headers);

    // if ($key === $headers['X-Stadtrand-Key']) {
    //     $res = "ProcessWire - Success!";
    // } else {
    //     $res = "ProcessWire - Error!";
    // }
    // sleep(3);
    //

    // echo "X-Stadtrand-Key: " . $headers['X-Stadtrand-Key'];
    // echo "<br>";
    // echo "X-Stadtrand-Host: " . $headers['X-Stadtrand-Host'];
    // echo json_encode('apple');

} else {
    echo "NOJAX!!!";
    // $dishes = $pages->find("parent=1020");
    // foreach ($dishes as $dish) {
    //     // create a new page
    //     $dish->setOutputFormatting(false);
    //     $dish->name = $dish->id;
    //     $dish->template = "dish";
    //     $dish->save();
    // }
}
