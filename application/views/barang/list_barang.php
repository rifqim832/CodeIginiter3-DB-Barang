<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 0.875rem;
            opacity: 1;
            overflow-y: scroll;
            margin: 0;
        }

        .card {
            width: 80%;
            margin: auto;
        }

        .navbar {
            margin-left: 140px;
        }

        /* Theme Toggler */
        .theme-toggle {
            position: fixed;
            top: 50%;
            transform: translateY(-65%);
            text-align: center;
            z-index: 10;
            right: 0;
            left: auto;
            border: none;
            background-color: var(--bs-body-color);
        }

        html[data-bs-theme="dark"] .theme-toggle .fa-sun,
        html[data-bs-theme="light"] .theme-toggle .fa-moon {
            cursor: pointer;
            padding: 10px;
            display: block;
            font-size: 1.25rem;
            color: #FFF;
        }

        html[data-bs-theme="dark"] .theme-toggle .fa-moon {
            display: none;
        }

        html[data-bs-theme="light"] .theme-toggle .fa-sun {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <form action="<?php echo site_url('barang/search_barang'); ?>" method="post" class="d-flex">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Cari Nama Barang">
                <button class="btn btn-outline-success me-2" type="submit">Cari</button>
                <button class="btn btn-outline-danger" onclick="window.location.href='<?php echo base_url('barang'); ?>'" type="button">Reset</button>
            </form>
        </div>
    </nav>
    <br>
    <!-- untuk mengeluarkan data -->
    <div class="card">
        <div class="card-header text-white bg-secondary">
            Data Barang
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kategori Barang</th>
                        <th scope="col">Deskripsi Barang</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stock Barang</th>
                        <th scope="col">Supplier Barang</th>
                        <th scope="col">Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($barang as $brg) { ?>
                        <tr>
                            <td><?php echo $brg['id']; ?></td>
                            <td><?php echo $brg['kode_barang']; ?></td>
                            <td><?php echo $brg['nama_barang']; ?></td>
                            <td><?php echo $brg['kategori_barang']; ?></td>
                            <td><?php echo $brg['deskripsi_barang']; ?></td>
                            <td><?php echo $brg['harga_beli']; ?></td>
                            <td><?php echo $brg['harga_jual']; ?></td>
                            <td><?php echo $brg['stock_barang']; ?></td>
                            <td><?php echo $brg['supplier_barang']; ?></td>
                            <td><?php echo $brg['tanggal_masuk']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector(".theme-toggle").addEventListener("click", () => {
            toggleLocalStorage();
            toggleRootClass();
        });

        function toggleRootClass() {
            const current = document.documentElement.getAttribute('data-bs-theme');
            const inverted = current == 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-bs-theme', inverted);
        }

        function toggleLocalStorage() {
            if (isLight()) {
                localStorage.removeItem("light");
            } else {
                localStorage.setItem("light", "set");
            }
        }

        function isLight() {
            return localStorage.getItem("light");
        }

        if (isLight()) {
            toggleRootClass();
        }
    </script>
</body>

</html>