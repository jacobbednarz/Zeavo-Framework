<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
</head>
<body>
    <h1><?php echo $pageHeader; ?></h1>
    <p><?php echo $welcomeParagraph; ?></p>
    <p>This file is <code>example_view.php</code> from <code>application/views</code> directory. Additional variables passed to this file by creating another method and extracting the variable.</p>
    <pre>
function myMethod($queryString = '') {
    $data['queryString'] = $queryString;
    $this->loadView('view_file', $data);
}
    </pre>
</body>
</html>