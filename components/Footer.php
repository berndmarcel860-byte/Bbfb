<footer class="footer">
    <div class="footer-info">
        <p id="aboutus"><?php echo htmlspecialchars($settings['site_name']); ?> is proud to be an Equal Employment Opportunity and Affirmative Action employer. We do not discriminate based upon race, religion, color, national origin, sex (including pregnancy, childbirth, reproductive health decisions, or related medical conditions), sexual orientation, gender identity, gender expression, age, status as a protected veteran, status as an individual with a disability, genetic information, political views or activity, or other applicable legally protected characteristics. You may view our Equal Employment Opportunity notice here. We also consider qualified applicants with criminal histories, consistent with applicable federal, state and local law. We may use your information to maintain the safety and security of <?php echo htmlspecialchars($settings['site_name']); ?>, its employees, and others as required or permitted by law. You may view <?php echo htmlspecialchars($settings['site_name']); ?>'s Pay Transparency Policy, Equal Employment Opportunity is the Law notice, and Notice to Applicants for Employment and Employees by clicking on their corresponding links. Additionally, <?php echo htmlspecialchars($settings['site_name']); ?> participates in the E-Verify program in certain locations, as required by law.</p>
        <p><?php echo htmlspecialchars($settings['site_name']); ?> is committed to providing reasonable accommodations for qualified individuals with disabilities and disabled veterans in our job application procedures.</p>
    </div>
    <hr class="footer-divider">
    <div class="footer-content">
        <div class="footer-left">
            <div class="footer-logo">
                <img src="./assets/img/logo.png" alt="Company Logo">
            </div>
            <div class="footer-address">
                <p>123 Main Street<br>City, Country</p>
            </div>
            <div class="footer-social-media">
                <a href="<?php echo htmlspecialchars($settings['facebook_link']); ?>" class="social-icon facebook" title="Facebook" target="_blank"></a>
                <a href="<?php echo htmlspecialchars($settings['instagram_link']); ?>" class="social-icon instagram" title="Instagram" target="_blank"></a>
                <a href="<?php echo htmlspecialchars($settings['twitter_link']); ?>" class="social-icon twitter" title="Twitter" target="_blank"></a>
                <a href="<?php echo htmlspecialchars($settings['linkedin_link']); ?>" class="social-icon linkedin" title="LinkedIn" target="_blank"></a>
            </div>
        </div>
        <div class="footer-right">
            <div class="footer-links-left">
                <a href="#job-section">Jobs</a>
                <a href="#job-section">Locations</a>
            </div>
            <div class="footer-links-right">
                <a href="#aboutus">About Us</a>
                <a href="#" onclick="toggleDropdown()">My Career</a>
            </div>
        </div>
    </div>
</footer>
