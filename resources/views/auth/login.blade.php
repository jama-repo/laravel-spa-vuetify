@extends('layouts.access')

@section('content')
	<v-app>
     	<main>
    		<login-page></login-page>
    	</main>
 	</v-app>
@stop
@section('script')
<script>
	document.title = 'Login';
</script>
@stop