@extends('layouts.access')

@section('content')
	<v-app>
     	<main>
    		<register-page></register-page>
    	</main>
 	</v-app>
@stop

@section('script')
<script>
	document.title = 'Register';
</script>
@stop