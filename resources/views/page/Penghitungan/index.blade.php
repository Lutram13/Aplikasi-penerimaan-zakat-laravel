{{-- Mengambil template dari master --}}
@extends('template.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Penghitungan Zakat')

{{-- Memberi nama judul header content --}}
@section('header', 'Penghitungan Zakat')

{{-- isi content  --}}
@section('content')
    
@endsection

{{-- isi javascript --}}
@push('script')

@endpush