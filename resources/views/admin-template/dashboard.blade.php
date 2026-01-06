@extends('admin-template.layouts.app')
@section('meta&title')
    <title> Dashboard | WORLDCULTURE EMPOWERMENT</title>
@endsection

@section('content')
    <div class="row  mt-4">
        <h2>
            Merhaba {{ Auth::user()->name }} hoş geldin! 🥳
        </h2>

        <h4 class="mt-3 mb-5 text-center">
            Yönetim paneline giriş yaptın.
            <br> Burada çeşitli yönetimsel işleri gerçekleştirebilirsin.
            <br>Sol kısımda bulunan menüden istediğin sayfaya geçiş yapabilirsin.
        </h4>

        <div>
            <h4 style="float: center;">
                Yapabileceğin bazı işlemler şunlardır:
                <ul class="list-unstyled">
                    <li>• Üyeliklerin takibi</li>
                    <li>• Bağışçılar ve bağış işlemlerinin yönetilmesi (Henüz Aktif Değil)</li>
                    <li>• Fatura takibi ve yeni fatura işlemleri (Henüz Aktif Değil)</li>
                    <li>• Mail takibi ve yeni mail işlemleri (Henüz Aktif Değil)</li>
                    <li>• Bazı Web site içeriklerinin düzenlenmesi (Henüz Aktif Değil)</li>
                </ul>
                İyi çalışmalar dilerim!
            </h4>
        </div>

        <h4>
        </h4>
    </div>
@endsection

@section('page-scripts')
@endsection
