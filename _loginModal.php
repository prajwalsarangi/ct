 <!-- Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content"> 
             <div class="modal-header">
                 <h5 class="modal-title" id="loginModalLabel">login to iDiscuss</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action ="/forum/handleLogin.php" method = "post">
                 <div class="modal-body">

                     <div class="mb-3"> 
                         <label for="email" class="form-label">username</label>
                         <input type="text" class="form-control" id="email" name = "email" aria-describedby="emailHelp">
                      <!--   <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                     </div>
                     <div class="mb-3">
                         <label for="pass" class="form-label">Password</label>
                         <input type="password" class="form-control" id="pass" name = "pass">
                     </div>
                     <div class="mb-3 form-check">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1">
                         <label class="form-check-label" for="exampleCheck1">Check me out</label>
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>


                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save changes</button>
                 </div>
             </form>
         </div>
     </div>
 </div>