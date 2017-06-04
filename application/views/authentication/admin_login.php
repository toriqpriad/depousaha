
<div class="content">
    <div class="container-fluid">      
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="card card-user" style="margin-top:100px">
                    <div class="image">
                        <img src="<?= BACKEND_STATIC_FILES ?>img/background.jpg" alt="...">
                    </div>
                    <div class="content">
                        <div class="author">
                            <br><br><br><br>
                            <p class="description text-left">
                                Login untuk memulai sesi :
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" class="form-control border-input" placeholder="Username" id="username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="password" class="form-control border-input" placeholder="Password" id="password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-fill btn-block" onclick="login()">Masuk</button>
                                </div>
                            </div>
                        </div>

                    </div>                                        
                </div>
            </div>            
        </div>
    </div>
</div>

