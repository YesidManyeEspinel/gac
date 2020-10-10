@if(count($errors)>0)
	<script type="text/javascript">
		swal({
	    	"text":"`@foreach($errors->all() as $error){{$error}}@endforeach`",
	    	"buttons":{"cancel":false,"confirm":true},
	    	"title":"Oops!",
	    	"icon":"error"});
	</script>
@endif