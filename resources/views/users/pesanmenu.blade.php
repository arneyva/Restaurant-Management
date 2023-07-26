<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Pesan Menu Makanan
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="">
                        <div>
                            <input type="text" class="form-control" placeholder="Nama Pemesan" />
                        </div>
                        {{-- <div>
                            <input type="text" class="form-control" placeholder="Phone Number" />
                        </div> --}}
                       
                        <div>
                            <input type="email" class="form-control" placeholder="Email Pemesan" />
                        </div>
                        <div>
                            {{-- <input type="text" class="form-control" placeholder="" /> --}}
                            <select class="form-control" id="" name="doctor">
                                <option value="">Menu Yang Dipesan</option>
                                @foreach ($makanan as $makanan)
                                    <option value="{{ $makanan->nama }}">
                                        {{ $makanan->nama }}</option>
                                @endforeach


                            </select>
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Jumlah" />
                        </div>
                        <div>
                            <input type="date" class="form-control">
                        </div>
                        <div class="btn_box">
                            <button>
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</section>