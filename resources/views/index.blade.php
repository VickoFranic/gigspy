<!-- 
	So ! 
	You little sneaky...just kidding ! ;)

	You wanna see more of GigSpy App ?
	
	Contact me at vfranic@gmail.com, always glad to talk with other developers.
-->

@include('index.header')

  @if(isset($user))
    @include('index.userinfo')
  @else
    @include('index.start')
  @endif

@include('index.footer');