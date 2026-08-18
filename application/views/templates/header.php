<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
	<link rel="shortcut icon" href="<?= base_url('assets/images/logoipsum.svg') ?>" type="image/x-icon">
</head>
<body class="d-flex flex-column min-vh-100">
<?= $this->toastify->render(); ?>