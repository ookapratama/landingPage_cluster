@extends('admin._layouts.index')

{{-- @push('Data Master')
    here show
@endpush --}}

@push($title)
    active
@endpush

@section('content')
    <!--begin::Toolbar-->
    @component('admin._card.breadcrumb')
        @slot('header')
            {{ $title }}
        @endslot
        @slot('page')
            Form
        @endslot
    @endcomponent
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Tables Widget 10-->
            <div class="card mb-5 mb-xl-8">

                <!--begin::Header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Form {{ isset($data->id) ? 'Edit' : 'Input' }}</span>
                    </h3>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-3">

                    <div class="row mt-5">
                        <!--begin:Form-->
                        <form id="kt_modal_new_target_form" class="form" action="#">
                            <input name="_method" type="hidden" id="methodId"
                                value="{{ isset($data->id) ? 'PUT' : 'POST' }}">
                            <input type="hidden" name="id" id="formId" value="{{ $data->id ?? null }}">
                            @csrf


                            <!--begin::Input group-->
                            <div class="row g-9 mb-8">
                                <div class="col-md-10 fv-row">
                                    <div class="col-md-12 fv-row">
                                        <label class="fs-6 fw-semibold mb-2">Nomor Surat</label>
                                        <input type="text" class="form-control" name="nomor" id="nomor"
                                            value="{{ isset($data->nomor) ? $data->nomor : '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-primary" id="fetchData">Cek Nomor Surat</button>
                                </div>
                            </div>
                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Status</label>
                                    <select class="form-select" data-control="select2" data-hide-search="false"
                                        data-placeholder="Pilih Status" name="status" id="status">
                                        <option value="">Status...</option>
                                        <option {{ isset($data->status) && $data->status == 'biasa' ? 'selected' : '' }}
                                            value="biasa">Biasa</option>
                                        <option {{ isset($data->status) && $data->status == 'penting' ? 'selected' : '' }}
                                            value="penting">Penting</option>
                                        <option {{ isset($data->status) && $data->status == 'terbatas' ? 'selected' : '' }}
                                            value="terbatas">Terbatas</option>
                                        <option
                                            {{ isset($data->status) && $data->status == 'sangat terbatas' ? 'selected' : '' }}
                                            value="sangat terbatas">Sangat Terbatas</option>
                                        <option {{ isset($data->status) && $data->status == 'rahasia' ? 'selected' : '' }}
                                            value="rahasia">Rahasia</option>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Jenis Nomor Surat</label>
                                    <select class="form-select" data-control="select2" data-hide-search="false"
                                        data-placeholder="Pilih Jenis No Surat" name="jenis_nosurat" id="jenis_nosurat">
                                        <option value="">Pilih Jenis No Surat...</option>
                                        <option
                                            {{ isset($data->jenis_nosurat) && $data->jenis_nosurat == 'nomor_sk' ? 'selected' : '' }}
                                            value="nomor_sk">Nomor SK</option>
                                        <option
                                            {{ isset($data->jenis_nosurat) && $data->jenis_nosurat == 'nomor_surat' ? 'selected' : '' }}
                                            value="nomor_surat">Nomor Surat</option>
                                    </select>
                                </div>


                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Kode Klasifikasi</label>
                                    {{-- <input type="text" class="form-control" name="" id="kd_klasifikasi_id"
                                        value="{{ isset($data->id) ? $data->id : '' }}
                                        "> --}}
                                    <select class="form-select" name="kd_klasifikasi_id" id="kd_klasifikasi_id"
                                        data-control="select2" data-hide-search="false"
                                        data-placeholder="Pilih Kode Klasifikasi">
                                        <option value="">--- Pilih Kode Klasifikasi ---</option>
                                        @foreach (Helper::getData('kd_klasifikasis') as $v)
                                            <option {{ isset($data->id) && $data->id == $v->id ? 'selected' : '' }}
                                                value="{{ $v->id }}" data-kode="{{ $v->jenis_klasifikasi->kode }}"
                                                data-nomor="{{ $v->nomor }}">
                                                {{ $v->jenis_klasifikasi->kode . '.' . $v->nomor }} - {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="hidden" class="form-control" name="kd_klasifikasi_id"
                                        id="kd_klasifikasi_id_hidden"
                                        value="{{ isset($data->id) ? $data->id : '' }}
                                        "> --}}
                                </div>


                                <div class="col-md-6
                                        fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Perihal</label>
                                    <input type="text" class="form-control" name="perihal" id="perihal"
                                        value="{{ isset($data->perihal) ? $data->perihal : '' }}">
                                </div>
                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Tanggal Surat</label>
                                    {{-- <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="tgl_surat"
                                        id="tgl_surat" value="{{ isset($data->tgl_surat) ? $data->tgl_surat : '' }}" /> --}}
                                    <input value="{{ isset($data->tgl_surat) ? $data->tgl_surat : '' }}" type="text"
                                        placeholder="dd/mm/yyyy" onfocus="(this.type='date')" onblur="(this.type='text')"
                                        class="form-control" name="tgl_surat" id="tgl_surat" />
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Asal </label>
                                    <select class="form-select" data-control="select2" data-hide-search="false"
                                        data-placeholder="Pilih atau Ketikkan Asal" name="asal" id="asal">
                                        <option value="">Pilih Asal...</option>
                                        @if (isset($data->asalSurat?->id) &&
                                                !in_array($data->asalSurat?->id, Helper::getData('kd_units')->pluck('id')->toArray()))
                                            <option value="{{ $data->asalSurat?->id }}" selected>
                                                {{ $data->asalSurat?->id }}
                                            </option>
                                        @endif
                                        @foreach (Helper::getData('kd_units') as $v)
                                            <option
                                                {{ isset($data->asalSurat?->id) && $data->asalSurat?->id == $v->id ? 'selected' : '' }}
                                                value="{{ $v->id }}" data-nomor="{{ $v->nomor }}"
                                                data-kode="{{ $v->kode }}">
                                                {{ $v->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Tanggal Kirim</label>
                                    <input value="{{ isset($data->tgl_kirim) ? $data->tgl_kirim : '' }}" type="text"
                                        placeholder="dd/mm/yyyy" onfocus="(this.type='date')" onblur="(this.type='text')"
                                        class="form-control" name="tgl_kirim" id="tgl_kirim" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Tanggal Input</label>
                                    <input type="date" class="form-control" name="tgl_input" id="tgl_input"
                                        value="{{ isset($data->tgl_input) ? $data->tgl_input : \Carbon\Carbon::now()->format('Y-m-d') }}"
                                        readonly />
                                </div>
                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Tujuan</label>
                                    <select class="form-select" data-control="select2" data-hide-search="false"
                                        data-placeholder="Pilih atau Ketikkan Tujuan" name="tujuan" id="tujuan">
                                        <option value="">Pilih Tujuan...</option>
                                        @if (isset($data->tujuan) && !in_array($data->tujuan, Helper::getData('kd_units')->pluck('id')->toArray()))
                                            <option value="{{ $data->tujuan }}" selected>
                                                {{ $data->tujuan }}
                                            </option>
                                        @endif
                                        @foreach (Helper::getData('kd_units') as $a)
                                            <option {{ isset($data->tujuan) && $data->tujuan == $a->id ? 'selected' : '' }}
                                                value="{{ $a->id }}">
                                                {{ $a->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Kepada</label>
                                    <input type="text" class="form-control" name="kepada" id="kepada"
                                        value="{{ isset($data->kepada) ? $data->kepada : '' }}" />
                                </div>
                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">TTD</label>
                                    <input type="text" class="form-control" name="ttd" id="ttd"
                                        value="{{ isset($data->ttd) ? $data->ttd : '' }}" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">File</label>
                                    <input type="file" class="form-control" name="file" id="file" />
                                    <input type="hidden" value="{{ isset($data->file) ? $data->file : '' }}"
                                        name="file_old" id="file_old" />
                                    @if (isset($data->file) && !empty($data->file))
                                        <!-- Display the existing file link if it exists -->
                                        <div class="mb-2">
                                            <a href="{{ asset('uploads/surat-keluar/' . $data->file) }}"
                                                target="_blank">Lihat File Saat Ini</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Jenis Surat</label>
                                    <select class="form-select" data-control="select2" data-hide-search="false"
                                        data-placeholder="Pilih Status" name="jenis" id="jenis">
                                        <option value="">Jenis...</option>
                                        <option {{ isset($data->jenis) && $data->jenis == 'vital' ? 'selected' : '' }}
                                            value="vital">Vital</option>
                                        <option {{ isset($data->jenis) && $data->jenis == 'umum' ? 'selected' : '' }}
                                            value="umum">Umum</option>
                                        <option {{ isset($data->jenis) && $data->jenis == 'terjaga' ? 'selected' : '' }}
                                            value="terjaga">Terjaga</option>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Nomor Rak (opsional)</label>

                                    <input type="text" class="form-control" name="no_rak" placeholder="Nomor Rak"
                                        value="{{ isset($data->no_rak) ? $data->no_rak : '' }}" id="no_rak" />
                                </div>
                              
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Nomor Box (opsional)</label>

                                    <input type="text" class="form-control" name="no_box" placeholder="Nomor Box"
                                        value="{{ isset($data->no_box) ? $data->no_box : '' }}" id="no_box" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Retensi Aktif</label>

                                    <select class="form-select mb-2" data-control="select2" name="retensi"
                                        id="retensi" data-selected="{{ $data->retensi ?? '' }}">
                                        <option value="">Pilih Retensi...</option>
                                        <!-- Opsi retensi akan ditambahkan melalui JavaScript -->
                                    </select>
                                    <div id="retensi_warning" style="display: none; color: red;" class="mt-2">
                                        <strong>Warning:</strong> Retensi period has expired!
                                    </div>
                                </div>
                            </div>
                            <div class="row g-9 mb-8">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Retensi Inaktif</label>

                                    <select class="form-select mb-2" data-control="select2" name="retensi2"
                                        id="retensi2" data-selected="{{ $data->retensi2 ?? '' }}">
                                        <option value="">Pilih Retensi...</option>
                                        <!-- Opsi retensi inaktif akan ditambahkan melalui JavaScript -->
                                    </select>
                                    <div id="retensi_warning" style="display: none; color: red;" class="mt-2">
                                        <strong>Warning:</strong> Retensi period has expired!
                                    </div>
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Retensi Nasib</label>

                                    <select class="form-select mb-2" data-control="select2" name="retensi3">
                                        <option value="">Pilih Retensi...</option>
                                        <option value="musnah"
                                            {{ isset($data->retensi3) && $data->retensi3 == 'musnah' ? 'selected' : '' }}>
                                            Musnah</option>
                                        <option value="permanen"
                                            {{ isset($data->retensi3) && $data->retensi3 == 'permanen' ? 'selected' : '' }}>
                                            Permanen</option>
                                    </select>
                                    <div id="retensi_warning" style="display: none; color: red;" class="mt-2">
                                        <strong>Warning:</strong> Retensi period has expired!
                                    </div>
                                </div>
                            </div>
                            <div class="row g-9 mb-8">
                                {{-- <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Permintaan Nomor Surat</label>
                                    <input type="text" class="form-control" name="permintaan" id="permintaan"
                                        value="{{ isset($data->permintaan) ? $data->permintaan : '' }}" />
                                </div> --}}
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Keterangan</label>
                                    <textarea id="uraian" name="uraian" class="form-control" id="" rows="5">
                                        {{ isset($data->uraian) ? strip_tags($data->uraian) : '' }}
                                    </textarea>
                                </div>
                            </div>

                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route($title . '.index') }}">
                                    <button type="button" id="kt_modal_new_target_cancel" class="btn btn-secondary me-3"
                                        data-bs-dismiss="modal">Batal</button>
                                </a>
                                @if (isset($data->id))
                                    <button type="submit" id="kt_modal_new_target_update" class="btn btn-primary">
                                        <span class="indicator-label">Update</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                @else
                                    <button type="submit" id="kt_modal_new_target_save" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                @endif
                            </div>


                            <!--end::Actions-->

                        </form>
                        <!--end:Form-->
                    </div>

                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 10-->

        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection

@push('jsScriptForm')
    <script type="text/javascript">
        function fetchNomorSuratData() {
            let nomor = $('#nomor').val();
            let jenis_nosurat = $('#jenis_nosurat').val();
            if (jenis_nosurat) {
                $.ajax({
                    url: "{{ route('get.no.surat.data') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nomor: nomor,
                        jenis_nosurat: jenis_nosurat
                    },
                    success: function(response) {
                        if (response.success) {
                            // Isi form dengan data dari NoSurat
                            $('#perihal').val(response.data.perihal);
                            // $('#kd_klasifikasi_id').val(response.data.klasifikasi.id).change();
                            // $('#kd_klasifikasi_id_hidden').val(response.data.kd_klasifikasi_id);
                            $('#tgl_surat').val(response.data.tgl_surat);
                            $('#asal').val(response.data.asal_surat.id).change();
                            $('#jenis_nosurat').val(response.data.jenis).change();
                            $('#status').val(response.data.status).change();
                            $('#tujuan').val(response.data.tujuan).change();

                            updateRetensi();
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Terjadi kesalahan. Silakan coba lagi.'.xhr);
                    }
                });
            } else {
                toastr.error("Silakan pilih jenis nomor surat terlebih dahulu.");
            }
        }

        $('#fetchData').on('click', function() {
            fetchNomorSuratData();
        });

        $('#nomor').on('blur', function() {
            fetchNomorSuratData();
        });

        function updateRetensi() {
            var tglSurat = document.getElementById('tgl_surat').value;
            var retensiSelect2 = document.getElementById('retensi2');

            // Initially disable retensi2
            $(retensiSelect2).prop('disabled', true).select2();

            if (tglSurat) {
                var baseDate = new Date(tglSurat);
                var retensiSelect = document.getElementById('retensi');
                var selectedRetensi = retensiSelect.getAttribute('data-selected');

                // Destroy existing Select2 instance
                // $(retensiSelect)?.select2('destroy');

                retensiSelect.innerHTML = '<option value="">Pilih Retensi...</option>';

                // Menambahkan opsi retensi aktif (1-5 Tahun)
                for (var i = 1; i <= 5; i++) {
                    var retensiDate = new Date(baseDate);
                    retensiDate.setFullYear(baseDate.getFullYear() + i);

                    var option = document.createElement("option");
                    option.value = retensiDate.toISOString().split('T')[0];
                    option.text = i + " Tahun (Aktif hingga: " + retensiDate.toLocaleDateString('id-ID') + ")";
                    if (option.value === selectedRetensi) {
                        option.selected = true;
                    }
                    retensiSelect.appendChild(option);
                }

                // Reinitialize Select2
                $(retensiSelect).select2();

                // Add event listener for the first retensi dropdown using Select2 event
                $(retensiSelect).off('select2:select').on('select2:select', function(e) {
                    if (e.target.value) {
                        $(retensiSelect2).prop('disabled', false).select2();
                        updateRetensi2(e.target.value);
                    } else {
                        $(retensiSelect2).prop('disabled', true).select2();
                        retensiSelect2.innerHTML = '<option value="">Pilih Retensi...</option>';
                    }
                });

                // Initial update of retensi2 if retensi1 has a value
                if (retensiSelect.value) {
                    $(retensiSelect2).prop('disabled', false).select2();
                    updateRetensi2(retensiSelect.value);
                } else {
                    $(retensiSelect2).prop('disabled', true).select2();
                    retensiSelect2.innerHTML = '<option value="">Pilih Retensi...</option>';
                }
            }
        }

        function updateRetensi2(selectedActiveDate) {
            if (selectedActiveDate) {
                var baseDate = new Date(selectedActiveDate);
                var retensiSelect2 = document.getElementById('retensi2');
                var selectedRetensi2 = retensiSelect2.getAttribute('data-selected');

                // Destroy existing Select2 instance
                $(retensiSelect2).select2('destroy');

                retensiSelect2.innerHTML = '<option value="">Pilih Retensi...</option>';

                for (var i = 2; i <= 15; i++) {
                    var retensiDate2 = new Date(baseDate);
                    retensiDate2.setFullYear(baseDate.getFullYear() + i);

                    var option2 = document.createElement("option");
                    option2.value = retensiDate2.toISOString().split('T')[0];
                    option2.text = i + " Tahun (Inaktif hingga: " + retensiDate2.toLocaleDateString('id-ID') + ")";
                    if (option2.value === selectedRetensi2) {
                        option2.selected = true;
                    }
                    retensiSelect2.appendChild(option2);
                }

                // Reinitialize Select2
                $(retensiSelect2).select2();
            }
        }

        // Make sure to call updateRetensi when tgl_surat changes
        document.getElementById('tgl_surat').addEventListener('change', function() {
            updateRetensi();
        });

        // Initial call to set up the initial state
        document.addEventListener('DOMContentLoaded', function() {
            updateRetensi();
        });

        const retensiCategory = document.getElementById('retensi_category');
        const retensiDuration = document.getElementById('retensi');
        const retensiTampil = document.getElementById('retensi_tampil');
        const retensiDate = document.getElementById('retensi_date');
        const retensiWarning = document.getElementById('retensi_warning');

        // Populate duration options based on selected category
        retensiCategory?.addEventListener('change', function() {
            retensiTampil.style.display = 'block';
            retensiDuration.innerHTML = '';

            if (this.value == 'aktif') {
                retensiDuration.style.display = 'block';

                retensiDuration.innerHTML = `
                <option value="">Pilih Durasi...</option>
                <option value="{{ $tahun->addYears(1) }}">1 Tahun</option>
                <option value="{{ $tahun->addYears(2) }}">2 Tahun</option>
                <option value="{{ $tahun->addYears(3) }}">3 Tahun</option>
                <option value="{{ $tahun->addYears(4) }}">4 Tahun</option>
                <option value="{{ $tahun->addYears(5) }}">5 Tahun</option>
                `;
            } else if (this.value == 'inaktif') {
                retensiDuration.style.display = 'block';
                retensiDuration.innerHTML = `
                <option value="">Pilih Durasi...</option>
                <option value="{{ $tahun->addYears(2) }}">2 Tahun</option>
                <option value="{{ $tahun->addYears(3) }}">3 Tahun</option>
                <option value="{{ $tahun->addYears(4) }}">4 Tahun</option>
                <option value="{{ $tahun->addYears(5) }}">5 Tahun</option>
                <option value="{{ $tahun->addYears(6) }}">6 Tahun</option>
                <option value="{{ $tahun->addYears(7) }}">7 Tahun</option>
                <option value="{{ $tahun->addYears(8) }}">8 Tahun</option>
                <option value="{{ $tahun->addYears(9) }}">9 Tahun</option>
                <option value="{{ $tahun->addYears(10) }}">10 Tahun</option>
                <option value="{{ $tahun->addYears(11) }}">11 Tahun</option>
                <option value="{{ $tahun->addYears(12) }}">12 Tahun</option>
                <option value="{{ $tahun->addYears(13) }}">13 Tahun</option>
                <option value="{{ $tahun->addYears(14) }}">14 Tahun</option>
                <option value="{{ $tahun->addYears(15) }}">15 Tahun</option>
                `;
            } else if (this.value == 'nasib') {
                retensiDuration.style.display = 'block';
                retensiDuration.innerHTML = `
                <option value="musnah">Musnah</option>
                <option value="permanen">Permanen</option>
            `;
            } else {
                retensiDuration.style.display = 'none';
            }
        });

        // Check if the retention period has expired
        retensiDate?.addEventListener('change', function() {
            checkRetentionExpiration();
        });

        retensiDuration?.addEventListener('change', function() {
            // Hanya lakukan pengecekan durasi jika kategori bukan 'nasib'
            if (retensiCategory.value !== 'nasib') {
                checkRetentionExpiration();
            }
        });

        function checkRetentionExpiration() {
            const selectedDate = new Date(retensiDate.value);
            const duration = parseInt(retensiDuration.value);

            if (!isNaN(duration) && retensiCategory.value !== 'nasib') {
                const expirationDate = new Date(selectedDate);
                expirationDate.setFullYear(expirationDate.getFullYear() + duration);

                const currentDate = new Date();
                if (currentDate > expirationDate) {
                    retensiWarning.style.display = 'block';
                } else {
                    retensiWarning.style.display = 'none';
                }
            } else {
                retensiWarning.style.display = 'none';
            }
        }

        $(document).ready(function() {
            // Inisialisasi select2
            $('#tujuan').select2({
                tags: true, // Memungkinkan input manual
                placeholder: "Pilih Tujuan..."
            });

            const tujuanOption = $('.tujuan-lain');
            const tujuanForm = $('#tujuanLain');
            tujuanOption.hide();

            // jika form edit
            const getValueTujuanOption = $('#tujuan option').filter((i, v) => {
                return v.value == tujuanForm.val();
            });

            if (getValueTujuanOption.length === 0 && tujuanForm.val() !== '') {
                tujuanOption.show();
                tujuanForm.val(tujuanForm.val());
                $('#tujuan').val('20').change();
            } else {
                tujuanOption.hide();
            }

            $('#tujuan').on('change', function() {
                let tujuanValue = $(this).val();

                if (tujuanValue == '20') {
                    tujuanOption.show();
                } else {
                    tujuanOption.hide();
                }
            });

            const editAsal = "{{ isset($data->asal) ? $data->asal : '' }}";
            if (editAsal && editAsal?.length > 0) {
                $("#asal").val(editAsal).trigger("change")
            }

            const editTujuan = "{{ isset($data->tujuan) ? $data->tujuan : '' }}";
            if (editTujuan && editTujuan?.length > 0) {
                $("#tujuan").val(editTujuan).trigger("change")
            }

        });

        ClassicEditor
            .create(document.querySelector('#uraian'))
            .then(editor => {
                window.editor = editor
            })
            .catch(error => {
                console.error('CKEditor initialization failed:', error);
            });


        const form = document.getElementById('kt_modal_new_target_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form, {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Nama is required'
                            }
                        }
                    },
                    'code': {
                        validators: {
                            notEmpty: {
                                message: 'Kode is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                },

            }
        );
    </script>

    @if (isset($data->id))
        @include('admin._card._updateAjax')
    @else
        @include('admin._card._createAjax')
    @endif

@endpush
