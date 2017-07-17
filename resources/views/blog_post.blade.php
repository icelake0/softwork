@extends('layouts.app')

@section('content')
</br></br></br>
			<div class ='row'>
				<div class='col-lg-2'></div>
				<div class='col-lg-8' style='background-color:#ffffff;'>						
					<div class='row'>
							<div class='col-lg-1'></div>
								<div class='col-lg-10' style='padding-bottom:50px'><br>
									@foreach($blog_posts as $blog_post)
										<!--begining of a post-->
										<div class='blogpost' style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
											border-radius:10px 10px 10px 10px;
											background-color:#f0f5f5;
											padding:10px 10px 10px 10px;'><!--temp till i get a solution-->
												Softwork |
												<span style='color:#3399FF'>
													{{$blog_post->time_posted->diffForHumans()}}
												</span> |
												<span class='badge'>{{$blog_post->number_of_comments}}</span> comment(s)
												<a href='/blog_page?blog_post_id={{$blog_post->id}}'><h4>{{$blog_post->title}}</h4></a>
												<div class='row'>
													<div class='col-xs-4'>
														<img src="images/blogposts/{{$blog_post->image_name}}" class='img-rounded' alt='images' style='width:100%; height:100px;'>
													</div>
													<div class='col-xs-8'>
														<span>{{substr($blog_post->content , 0, 300)}} </span>
														<a href='/blog_page?blog_post_id={{$blog_post->id}}'>continue reading...</a>
													</div>
												</div>
											</div>
										<hr/>
										<!--end of a post-->
									@endforeach
								</div>
							<div class='col-lg-1'></div>
					</div>
				</div>
				<div class='col-lg-2'></div>
			</div>
@endsection