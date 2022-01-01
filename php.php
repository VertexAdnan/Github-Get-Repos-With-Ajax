<?php
function getPosts()
{
    $username = "VertexAdnan";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/".$username."/repos");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERAGENT, "php/curl");
    curl_setopt($ch, CURLOPT_CAINFO, "C:/xampp\apache\bin\curl-ca-bundle.crt");
    $output = curl_exec($ch);
    $err     = curl_errno($ch);
    $errmsg  = curl_error($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    if (!$err) {
        return json_decode($output);
    } else {
        var_dump($errmsg);
    }
}
if (isset($_POST['getPost'])) {
    foreach (getPosts() as $row) {
        echo "<tr>";
        echo "<td>" . $row->name . "</td>";
        echo "<td><a href='" . $row->html_url . "'>" . $row->html_url . "</a></td>";
        echo "</tr>";
    }
}
