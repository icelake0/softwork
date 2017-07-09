@extends('layouts.app')

@section('content')
</br></br></br>
<div class ='row'>
				<div class='col-lg-2'></div>
				<div class='col-lg-8' style='background-color:#ffffff;'>
						<div class='row'>
							<div class='col-lg-1'></div>
							<div class='col-lg-10' style='padding-bottom:50px'>
								<form role="form" method="post" action="/sendMessage" class="styledform">
									{{ csrf_field() }}
									<label><h3>Compose Message</h3></label>
								    <div class="form-group">
									  <label for="content"><p>Max:5000 letters including space</p></label>
									  <textarea class="form-control" rows="1" name="content" id="content" maxlength="5000" required autofocus></textarea>
									</div>
								  <button type="submit" class="btn btn-default">send</button>
								</form>
								@foreach($messages as $message)
								<!--begining of a msg-->
									</br>
									</br>
										<span class='{{($message->direction==='r')?'r':'s'}}MessageSpan'>
											{{$message->content}}<br/>
											<span style='color:#ff1ab3; float:right'>{{$message->message_time->diffForHumans()}}</span>
										</span>
									</br>
									</br>
									<!--end of a msg-->
								@endforeach	
							</div>
							<div class='col-lg-1'></div>
						</div>
				</div>
				<div class='col-lg-2'></div>
			</div>
		</br></br>
@endsection