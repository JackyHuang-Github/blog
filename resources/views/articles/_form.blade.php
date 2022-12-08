<!-- 標題 -->
{!! Form::label('subject', '標題') !!}
{!! Form::text('subject', null, ['class'=>'myclass', 'style'=>'color:red;']) !!}<br>

@error('subject')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<!-- 分類 -->
{!! Form::label('category', '分類：') !!}
分類一{!! Form::radio('category', 1, true) !!}
分類二{!! Form::radio('category', 2, false) !!}
分類三{!! Form::radio('category', 3, false) !!}<br>

@error('category')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<!-- 內文 -->
{!! Form::label('desc', '內文') !!}
{!! Form::textarea('desc', null, ['cols' => 60, 'rows' => 20]) !!}<br>

@error('desc')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<!-- 狀態 -->
{!! Form::label('status', '狀態：') !!}
開啟{!! Form::radio('status', 1, true) !!}
關閉{!! Form::radio('status', 0, false) !!}<br>

<!-- 啟用日期 -->
{!! Form::label('enable_at', '啟用日期：', []) !!}
{!! Form::date('enable_at', null) !!}<br>

<!-- 標籤 -->
{!! Form::label('tags', '標籤：') !!}
{!! Form::label('tags[]', 'news') !!}
{!! Form::checkbox('tags[]', 'news', false) !!}
{!! Form::label('tags[]', 'skill') !!}
{!! Form::checkbox('tags[]', 'skill', false) !!}
{!! Form::label('tags[]', 'like') !!}
{!! Form::checkbox('tags[]', 'like', false) !!}<br>

{!! Form::label('pic', '圖片', []) !!}
{!! Form::file('pic', []) !!}<br><br>

{!! Form::submit('送出', []) !!}
{!! Form::reset('重置', []) !!}
