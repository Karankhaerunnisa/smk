<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class StoreFrontRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Setting::getValue('is_registration_open');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'major_id' => ['required', 'exists:majors,id'],

            // Personal
            'name' => ['required', 'string', 'max:100'],
            'nisn' => ['required', 'numeric', 'digits:10', 'unique:registrants,nisn'],
            'nik' => ['required', 'numeric', 'digits:16', 'unique:registrants,nik'],
            'birth_place' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'string'], // We'll cast to Enum in controller
            'religion' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:registrants,email'],
            'phone' => ['required', 'string', 'max:20'],

            // Address
            'alamat' => ['required', 'string'],
            'rt' => ['nullable', 'string', 'max:5'],
            'rw' => ['nullable', 'string', 'max:5'],
            'kelurahan' => ['required', 'string'],
            'kecamatan' => ['required', 'string'],
            'kota' => ['required', 'string'],
            'provinsi' => ['required', 'string'],
            'kode_pos' => ['required', 'numeric'],

            // Academic
            'asal_sekolah' => ['required', 'string'],
            'tahun_lulus' => ['required', 'numeric', 'digits:4'],
            'nilai_matematika' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'nilai_bahasa_indonesia' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'nilai_bahasa_inggris' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'nilai_ipa' => ['nullable', 'numeric', 'min:0', 'max:100'],

            // Parents (Mapped from flat inputs)
            'nama_ayah' => ['required', 'string'],
            'pekerjaan_ayah' => ['nullable', 'string'],
            'penghasilan_ayah' => ['nullable', 'string'],
            'no_hp_ayah' => ['nullable', 'string'],
            'nama_ibu' => ['required', 'string'],
            'pekerjaan_ibu' => ['nullable', 'string'],
            'penghasilan_ibu' => ['nullable', 'string'],
            'no_hp_ibu' => ['nullable', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            // Jurusan
            'major_id.required' => 'Silakan pilih jurusan yang diinginkan.',
            'major_id.exists'   => 'Jurusan yang dipilih tidak tersedia.',

            // Data Pribadi
            'name.required'       => 'Nama lengkap wajib diisi.',
            'name.max'            => 'Nama lengkap tidak boleh lebih dari 100 karakter.',
            'nisn.required'       => 'NISN wajib diisi.',
            'nisn.numeric'        => 'NISN harus berupa angka.',
            'nisn.digits'         => 'NISN harus terdiri dari 10 digit.',
            'nisn.unique'         => 'NISN ini sudah terdaftar dalam sistem.',
            'nik.required'        => 'NIK wajib diisi.',
            'nik.numeric'         => 'NIK harus berupa angka.',
            'nik.digits'          => 'NIK harus terdiri dari 16 digit.',
            'nik.unique'          => 'NIK ini sudah terdaftar dalam sistem.',
            'birth_place.required'=> 'Tempat lahir wajib diisi.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'gender.required'     => 'Silakan pilih jenis kelamin.',
            'religion.required'   => 'Silakan pilih agama.',
            'email.required'      => 'Alamat email wajib diisi.',
            'email.email'         => 'Format email tidak valid.',
            'email.unique'        => 'Email ini sudah digunakan oleh pendaftar lain.',
            'phone.required'      => 'Nomor HP/WhatsApp wajib diisi.',
            'phone.max'           => 'Nomor HP terlalu panjang.',

            // Alamat
            'alamat.required'    => 'Alamat lengkap (jalan/dusun) wajib diisi.',
            'kelurahan.required' => 'Kelurahan/Desa wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'kota.required'      => 'Kota/Kabupaten wajib diisi.',
            'provinsi.required'  => 'Provinsi wajib diisi.',
            'kode_pos.required'  => 'Kode pos wajib diisi.',
            'kode_pos.numeric'   => 'Kode pos harus berupa angka.',

            // Data Akademik
            'asal_sekolah.required' => 'Nama sekolah asal wajib diisi.',
            'tahun_lulus.required'  => 'Tahun lulus wajib diisi.',
            'tahun_lulus.digits'    => 'Tahun lulus harus 4 digit (contoh: 2024).',

            // Validasi Nilai (Range 0-100)
            'nilai_matematika.min' => 'Nilai Matematika tidak boleh kurang dari 0.',
            'nilai_matematika.max' => 'Nilai Matematika tidak boleh lebih dari 100.',
            'nilai_bahasa_indonesia.min' => 'Nilai B. Indonesia tidak boleh kurang dari 0.',
            'nilai_bahasa_indonesia.max' => 'Nilai B. Indonesia tidak boleh lebih dari 100.',
            'nilai_bahasa_inggris.min' => 'Nilai B. Inggris tidak boleh kurang dari 0.',
            'nilai_bahasa_inggris.max' => 'Nilai B. Inggris tidak boleh lebih dari 100.',
            'nilai_ipa.min' => 'Nilai IPA tidak boleh kurang dari 0.',
            'nilai_ipa.max' => 'Nilai IPA tidak boleh lebih dari 100.',

            // Data Orang Tua
            'nama_ayah.required' => 'Nama ayah kandung wajib diisi.',
            'nama_ibu.required'  => 'Nama ibu kandung wajib diisi.',
        ];
    }
}
