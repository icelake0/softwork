@extends('layouts.app')

@section('content')
</br></br></br>
			<div class ='row'>
				<div class='col-lg-2'></div>
				<div class='col-lg-8' style='background-color:#ffffff;'>						
				<div class='row'>
							<div class='col-lg-1'></div>
							<div class='col-lg-10' style='padding-bottom:50px'>
								@foreach($blog_posts as $blog_post)
									<!--begining of a post-->
									<br>
											Softwork |
											<span style='color:#3399FF'>
												{{$blog_post->time_posted->diffForHumans()}}
											</span> |
											<span class='badge'>{{$blog_post->number_of_comments}}</span> comment(s)
											<a href='/blog_page?blog_post_id={{$blog_post->id}}'><h4>{{$blog_post->title}}</h4></a>
											<img src="images/blog_posts/{{$blog_post->image_name}}" class='img-rounded' alt='images' width='100%' height='100%'>
												{{substr($blog_post->content , 0, 300)}} 
												<a href='/blog_page?blog_post_id={{$blog_post->id}}'>continue reading...</a>
										</div>
									<hr/>
									<!--end of a post-->
								@endforeach
							<div class='col-lg-1'></div>
							</div>
				</div>
				<div class='col-lg-2'></div>
			</div>
@endsection