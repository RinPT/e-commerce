<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Application Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #273142;">
            <a class="navbar-brand" style="margin-left: 2rem" href="#">Our Name/Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="border-left: solid; border-color: rgb(200, 200, 200); border-left-width: 1px; padding-left: 0.5rem;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link disabled text-light" href="#"><b>Seller Application Form</b></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="pt-5">
        <div class="container rounded p-4" style="background-color: rgba(52, 157, 255, 0.808)">
            <div class="row">
                <div class="col-12 text-light">
                    <b>All applications will be aproved by the admin! Please provide all necessary information about your company in the form belove.</b>
                </div>
            </div>
        </div>

        <div class="container rounded mt-5 p-2">
            <div class="col-12 p-4" style="background-color: white">
                <div class="col mb-4">
                    <h3 style="font-family: sans-serif">Seller Application Form</h3>
                </div>
                <form action="{{ route('admin.store.application') }}" method="post" role="form">
                    @csrf
                    <div class="form-row d-flex justify-content-center mb-3">
                        <div class="form-group col-md-5" style="margin-right: 15px">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"placeholder="Name">
                        </div>
                        <div class="form-group col-md-5" style="margin-left: 15px">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center mb-3" >
                        <div class="form-group col-md-5" style="margin-right: 15px">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-5" style="margin-left: 15px">
                            <label for="category">Category of the Products</label>
                            <select class="form-select" name="category">
                                <option disabled selected>Choose Category</option>
                                <option value="1">Electronics</option>
                                <option value="2">Clothes</option>
                                <option value="3">Fashion</option>
                                <option value="4">Yangaoov</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center mb-3">
                        <div class="form-group col-md-5" style="margin-right: 15px">
                            <label for="company_type">Company Type</label>
                            <select class="form-select" name="category">
                                <option disabled selected>Company Type</option>
                                <option value="1">Anonim Şirketi</option>
                                <option value="2">Şahıs Şirketi</option>
                                <option value="3">Limited Şirketi</option>
                                <option value="4">Yangaoov</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5" style="margin-left: 15px">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                       
                    </div>

                    <div class="form-row d-flex justify-content-center mb-3">
                        <div class="form-group col-md-5" style="margin-right: 15px">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" id="url" name="url">
                        </div>
                        <div class="form-group col-md-5" style="margin-left: 15px">
                            <label for="logo">Logo</label>
                            <input type="text" class="form-control" id="logo" name="logo">
                        </div>

                    </div>

                    <div class="form-row d-flex justify-content-center mb-3">
                        <div class="form-group col-md-5" style="margin-right: 15px">
                            <label for="country">Country</label>
                            <select class="form-select" name="country">
                                <option disabled selected>Select Country</option>
                                <option value="1">Cyprus</option>
                                <option value="2">Turkey</option>
                                <option value="3">United Kingdom</option>
                                <option value="4">Greece</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5" style="margin-left: 15px">
                            <label for="city">City</label>
                            <select class="form-select" name="city">
                                <option disabled selected>Select City</option>
                                <option value="1">Anonim Şirketi</option>
                                <option value="2">Şahıs Şirketi</option>
                                <option value="3">Limited Şirketi</option>
                                <option value="4">Yangaoov</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center mb-3">
                        <div class="form-group col-md-5" style="margin-right: 15px">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group col-md-5" style="margin-left: 15px">
                            <label for="tax_no">Tax Number</label>
                            <input type="number" class="form-control" id="tax_no" name="tax_no"placeholder="Tax No">
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-block">Submit Form</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
