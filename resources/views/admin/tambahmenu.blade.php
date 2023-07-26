<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ url('backend/assets//') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Restaurant</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('backend/assets//img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('backend/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('backend/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('backend/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('backend/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ url('backend/assets//vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('backend/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('backend/assets/js/config.js') }}"></script>
</head>

<body>

    {{-- otak atik bagian sini --}}
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu (sidebar) -->
            {{-- mengincludekan file lain --}}
            @include('admin.sidebar')
            <!-- / Menu (sidebar) -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('admin.navbar')
                <!-- / Navbar -->
              
                <!-- Content -->
                <div class="content-wrapper">
                  <div class="container-xxl flex-grow-1 container-p-y">
                    {{-- @if (session()->has('pesan'))
                      
                      <div class="alert alert-success">
                          {{ session()->get('pesan') }}
                          <button type="button" class="close" data-dismiss="alert"> X </button>
                      </div>
                  @endif
                <div class="row"> --}}
                  @include('admin.pesan')
                  
                    <!-- Basic Layout -->
                    <div class="col-xxl">
                      <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <h5 class="mb-0">Tambah Menu Makanan</h5>
                          <small class="text-muted float-end">Ethereal</small>
                        </div>
                        <div class="card-body">
                          {{-- otak atik bagian  form --}}
                          {{-- url tidak terlihat karena langsung diredirect back --}}
                          <form action="{{ url('berhasil_upload_menu') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Menu</label>
                              <div class="col-sm-10">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="nama" 
                                placeholder="Nama Menuu...." 
                                name="nama"
                                {{-- jangan lupa dikasih value session biar otomatis keisi sama inputan sebelumnya --}}
                                value="{{ Session::get('nama') }}"
                                 {{--jangan lupa dikasih required agar jika ada perintah harus diisi dan tidak boleh kosong  --}}
                                 required=""
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-company">Deskripsi Menu</label>
                              <div class="col-sm-10">
                                <input
                                  type="text"
                                  name="deskripsi"
                                  class="form-control"
                                  id="deskripsi"
                                  placeholder="Deskripsi Menu....."
                                  {{--jangan lupa dikasih required agar jika ada perintah harus diisi dan tidak boleh kosong  --}}
                                 required=""
                                  {{-- jangan lupa dikasih value session biar otomatis keisi sama inputan sebelumnya --}}
                                value="{{ Session::get('deskripsi') }}"
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-email">Harga</label>
                              <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                  <input
                                    type="text"
                                    id="harga"
                                    name="harga"
                                    class="form-control"
                                    placeholder="Harga Menu...."
                                    {{--jangan lupa dikasih required agar jika ada perintah harus diisi dan tidak boleh kosong  --}}
                                 required=""
                                 {{-- jangan lupa dikasih value session biar otomatis keisi sama inputan sebelumnya --}}
                                value="{{ Session::get('harga') }}"
                                  />
                                </div>
                                
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-phone">Foto</label>
                              <div class="col-sm-10">
                                <input
                                  type="file"
                                  name="foto"
                                  id="basic-default-phone"
                                  class="form-control phone-mask"
                                  {{-- placeholder="658 799 8941" --}}
                                  {{-- aria-label="658 799 8941" --}}
                                  aria-describedby="basic-default-phone"
                                  {{--jangan lupa dikasih required agar jika ada perintah harus diisi dan tidak boleh kosong  --}}
                                 required=""
                                 {{-- jangan lupa dikasih value session biar otomatis keisi sama inputan sebelumnya --}}
                                value="{{ Session::get('foto') }}"
                                />
                              </div>
                            </div>
                            {{-- <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                              <div class="col-sm-10">
                                <textarea
                                  id="basic-default-message"
                                  class="form-control"
                                  placeholder="Hi, Do you have a moment to talk Joe?"
                                  aria-label="Hi, Do you have a moment to talk Joe?"
                                  aria-describedby="basic-icon-default-message2"
                                ></textarea>
                              </div>
                            </div> --}}
                            <div class="demo-inline-spacing">
                              <div class="col-sm-10">
                                <button type="submit" class="btn btn-dark">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    
                  </div>
            </div>
        </div>
    </div>
                <!-- / Content -->  

                <!-- Footer -->

                <!-- / Footer -->
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    {{-- otak atik bagian sini --}}

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ url('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ url('backend/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ url('backend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ url('backend/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ url('backend/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
