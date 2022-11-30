<h1>表單建立頁面</h1>
{!! Form::open(['url'=>url('posts'), 'method'=>'POST', 'files'=>true]) !!}

{!! Form::label('title', '標題') !!}
{!! Form::text('title', '', ['class'=>'myclass', 'style'=>'color:red;', 'xx'=>'yy']) !!}<br>

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{!! Form::label('content', '內文') !!}
{!! Form::textarea('content', null, ['cols'=>60, 'rows'=>20]) !!}<br>

@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{!! Form::hidden('mode', 1) !!}

{!! Form::label('status', '是否開啟') !!}
開啟{!! Form::radio('status', 1, true) !!}
關閉{!! Form::radio('status', 0, false) !!}


你的興趣？
{!! Form::label('interests[]', '打球') !!}
{!! Form::checkbox('interests[]', 'playball', false) !!}
{!! Form::label('interests[]', '電影') !!}
{!! Form::checkbox('interests[]', 'movie', false) !!}
{!! Form::label('interests[]', '電玩') !!}
{!! Form::checkbox('interests[]', 'game', false) !!}<br><br>

{!! Form::select('mode', $modes, $mode, ['placeholder' => '請選擇商品模式']) !!}

{!! Form::label('month', '月份', []) !!}
{!! Form::selectMonth('month', null, []) !!}<br><br>

{!! Form::label('pic', '圖片', []) !!}
{!! Form::file('pic', []) !!}<br><br>

{!! Form::submit('送出', []) !!}
{!! Form::reset('重置', []) !!}
{!! Form::close() !!}

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div sytle = "color : red">{{ $error }}</div>
    @endforeach
@endif