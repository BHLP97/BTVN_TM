<h1> Notable Feedback Form </h1>
<div class="feedback-w3layouts">
    <form action=""<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"" method="post">
        <div class="field-w3-agile-grid leftf">
            <label>
                <i class="fa fa-user" aria-hidden="true"></i> Name :</label>
            <input type="text" name="name" placeholder=" " required="" />
        </div>
        <div class="field-w3-agile-grid rightf">
            <label>
                <i class="fa fa-envelope" aria-hidden="true"></i> Email :</label>
            <input type="email" name="email" placeholder=" " required="" />
        </div>
        <div class="clear"> </div>
        <div class="form-option-w3-agileits">
            <label>
                <i class="fa fa-comments" aria-hidden="true"></i> Feedback type :</label>
            <select class="form-control" name="type">
                <option></option>
                <option>Comments</option>
                <option>Bug Reports</option>
                <option>Questions</option>
                <option>Suggestions</option>
            </select>
        </div>
        <div class="text-field-agileits-w3layouts">
            <label>
                <i class="fa fa-comments" aria-hidden="true"></i> Describe Feedback :</label>
            <textarea name="comments" placeholder=" " required=""></textarea>
        </div>
        <div class="clear"> </div>
        <input type="submit" value="Submit">
    </form>
</div>
<!--copyright-->
<div class="copy-wthree">
    <p>© 2018 Notable Feedback Form . All Rights Reserved | Design by
        <a href="http://w3layouts.com/" target="_blank">W3layouts</a>
    </p>
</div>
<!--//copyright-->
<!-- SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>