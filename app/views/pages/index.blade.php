

<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">

                    <div class="description">
                        {{ HTML::image('img/logo2.png','Logo', array('class' => 'logo_class2')) }}
                    </div>
                    <br/>
                    <h1><strong>WASD</strong>box<i>(Beta)</i></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login </h3>

                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        {{ Form::open(array('url'=>'login', 'class'=>'login-form','name'=>'login', 'id'=>'login-form')) }}

                        <!-- Email Form Input -->
                        <div class="form-group">
                               {{ Form::label('email', 'Email:',array('class' => 'sr-only')) }}
                               {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
                        </div>

                        <!-- Password Form Input -->
                        <div class="form-group">
                               {{ Form::label('password', 'Password:',array('class' => 'sr-only')) }}
                               {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                        </div>

                        <button type="submit" class="btn">Sign in!</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>