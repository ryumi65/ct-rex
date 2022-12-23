<script src="<?= base_url(); ?>assets/js/store.js"></script>
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">

        <!-- Form KRS -->
        <div class="col-12 my-4">
            <div class="card">
                <div class="card-body pb-0">
                    <div>
                        <select class="form-select" name="nik" required>
                            <option selected disabled>Pilih Semester</option>
                        </select>
                    </div>
                </div>

                <div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        ID Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Total SKS</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kategori</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="products">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end my-1 mx-4">
                        <a class="btn btn-primary btn-sm ">ambil semua</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- Pengumuman 1 -->
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <h6> Form Pengisian Kartu Rencana Studi</h6>
                    <p id="total-price"></p>
                    <div class="table-responsive">
                        <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                        No.</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        ID Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Nama Matkul</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Total SKS</th>
                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                        Kategori</th>
                                    <th class="font-weight-bolder text-uppercase text-xs text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <div class="d-flex justify-content-end mx-4">
                                <a href="<?= site_url('mahasiswa/formkrs') ?>" class="btn btn-primary btn-sm ">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Footer -->
            <footer class="footer py-3">

                <!-- Logo Medsos -->
                <div class="container mx-auto text-center my-2">
                    <a href="https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ" target="_blank" class="text-secondary mx-3">
                        <i class="text-lg fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://id-id.facebook.com/universitasmuhammadiyahbandung" target="_blank" class="text-secondary mx-3">
                        <i class="text-lg fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/umbandung" target="_blank" class="text-secondary mx-3">
                        <i class="text-lg fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.twitter.com/umbandung" target="_blank" class="text-secondary mx-3">
                        <i class="text-lg fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://www.tiktok.com/@umbandung" target="_blank" class="text-secondary mx-3">
                        <i class="text-lg fa-brands fa-tiktok"></i>
                    </a>
                </div>

                <!-- Copyright -->
                <div class="container mx-auto text-center">
                    <p class="mb-0 text-secondary text-xs">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                    </p>
                </div>
            </footer>

            <!-- js -->
            <script>
                const products = [{
                        no: 1,
                        id: 'IF2020',
                        name: 'Integelensia Buatan',
                        weight: 3,
                        category: 'Wajib'
                    },
                    {
                        no: 2,
                        id: 'IF2021',
                        name: 'Integelensia Alami',
                        weight: 3,
                        category: 'Wajib'
                    },
                ]

                let cart = {
                    items: [],
                    totalPrice: 0
                }

                function renderAllProducts() {
                    const productTable = document.getElementById('products')
                    productTable.innerHTML = '';
                    products.forEach((product, index) => {
                        productTable.innerHTML += `
          <tr>
            <td>${product.no}</td>  
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.weight}</td>
            <td>${product.category}</td>
            <td>
            <div class="d-flex justify-content-center">
              <button
                class="btn btn-success"
                onclick="addToCart(${index})"
              >
              <i class="fa-solid fa-plus"></i>
              </button>
              </div>
            </td>
          <tr>
        `
                    })
                }

                function renderAllCartItems() {
                    const cartItemTable = document.getElementById('cart-items')
                    const totalPriceElement = document.getElementById('total-price')
                    let totalPrice = 0;
                    cartItemTable.innerHTML = ''
                    if (cart.items.length === 0) {
                        cartItemTable.innerHTML = `
          <tr>
            <td colspan="5">Belum ada Matkul</td>
          </tr>
        `;
                    }
                    cart.items.forEach((cartItem) => {
                        totalPrice += cartItem.total
                        cartItemTable.innerHTML += `
          <tr>
            <td>${cartItem.no}</td>  
            <td>${cartItem.id}</td>
            <td>${cartItem.name}</td>
            <td>${cartItem.weight}</td>
            <td>${cartItem.category}</td>
            <td>
            <div class="d-flex justify-content-center">
              <button
                class="btn btn-danger"
                onclick="removeFromCart('${cartItem.name}')"
              >
                Hapus
              </button>
              </div>
            </td>
          <tr>
        `
                    })

                    totalPriceElement.innerText = `Total SKS : ${totalPrice}`
                }

                function addToCart(productIndex) {
                    const product = products[productIndex]

                    let isAlreadyInCart = false

                    let newCartItems = cart.items.reduce((state, item) => {
                        if (item.name === product.name) {
                            isAlreadyInCart = true
                            const newItem = {
                                ...item,
                                quantity: item.quantity + 1,
                                total: (item.quantity + 1) * item.weight,
                            }
                            return [...state, newItem]
                        }
                        return [...state, item]
                    }, [])

                    if (!isAlreadyInCart) {
                        newCartItems.push({
                            ...product,
                            quantity: 1,
                            total: product.weight,
                        })
                    }

                    cart = {
                        ...cart,
                        items: newCartItems
                    }

                    renderAllCartItems()
                }

                function removeFromCart(productName) {
                    let isAlreadyInCart = false

                    let newCartItems = cart.items.reduce((state, item) => {
                        if (item.name === productName) {
                            isAlreadyInCart = true
                            const newItem = {
                                ...item,
                                quantity: item.quantity - 1,
                                total: (item.quantity - 1) * item.weight,
                            }
                            if (newItem.quantity !== 0) {
                                return [...state, newItem]
                            } else {
                                return state;
                            }
                        }
                        return [...state, item]
                    }, [])

                    cart = {
                        ...cart,
                        items: newCartItems
                    }

                    renderAllCartItems()
                }

                renderAllProducts()
                renderAllCartItems()
            </script>