

    <div class="accordion" id="createExcel">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btnHomePage" type="button" data-toggle="collapse" data-target="#excelForm" aria-expanded="true" aria-controls="collapseOne">
                        Créer un excel
                    </button>
                </h2>
            </div>
            <div id="excelForm" class="collapse " aria-labelledby="headingOne" data-parent="#createExcel">
                <div class="card-body">
                    <form  id="sendMail" method="post" enctype="multipart/form-data" action="#">
                        <div id="contentFormCreateExcel">
                            <div class="input-group date col-md-6" >
                                <label for ="date">Date: 
                                    <input type="date" data-data-format="DD MMMM YYYY" name="dateExcel" id="date" class="form-control" required >
                                </label>
                            </div>
                            <div class='input-text partnerChoice col-md-6'>
                                <label for="partnerChoice">Partner:
                                    <input type="select" list="partnerDataList" placeholder="choisissez un partener" name="partnerName" class="form-control" style="min-width:200px" id="partnerChoice"required>
                                    <datalist id="partnerDataList">
                                            <option value="whynote">Whynote</option>
                                            <option value="emotional">Emotional</option>
                                    </datalist>
                                </label>
                            </div>
                            <div class="form-row" >
                                <div class="input-group message col-md-10" >
                                    <label for="message">Votre demande
                                        <textarea  class="form-control" name="message" id="message" rows="2" cols="50" ></textarea>
                                    </label>
                                </div>
                                <input type="text" value="sub" id="subInput" name="subInput" style="display:none">
                            </div>
                       
                            <div class="card-footer">
                            
                                <button type="button" id="btnCreateExcel"  class="btn btn-primary">Créer</button>
                                
                               
                            </div>
                            
                            <div class="downloadLink"></div>
                        </div>
                        
                        </form> 
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <div class="accordion" id="createAccount">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btnHomePage" type="button" data-toggle="collapse" data-target="#FormNewAccount" aria-expanded="true" aria-controls="collapseOne">
                        Créer un compte
                    </button>
                </h2>
            </div>

            <div id="FormNewAccount" class="collapse " aria-labelledby="headingOne" data-parent="#createAccount">
                <div class="card-body">
                    <div class="wrapper fadeInDown">
                        <div id="formContentRegister" class="form">
                            <div class="fadeIn first">
                                <img src="src/images/logo-firstseller.jpg" id="icon" alt="User Icon" />
                            </div>
                            <form  autocomplete="false" method="post">
                                <h2>Inscription:</h2>
                                <input type="text"  name="loginregister"  class="fadeIn second"  placeholder="username" required>
                                <input type="password"  name="passregister" class="fadeIn third"   placeholder="password" required>
                                <input type="password"  name="pass_confirmregister" class="fadeIn fourth"   placeholder="Confirmer mot de passe" required>
                                <input type="submit" name="inscription" class="fadeIn five" class="btn login_btn">
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        
        
    

</div>
<script src="src/js/homeApp.js"></script>




