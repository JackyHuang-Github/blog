<!-- 表單建立頁面 -->
{!! Form::open(['url'=>url('/articles'), 'method' => 'POST', 'files' => true]) !!}

@include('articles._form')

<!-- 關閉表單 -->
{!! Form::close() !!}

@include('articles._error')
