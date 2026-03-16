<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
    <div class="footer-container">
        <div class="footer-content text-center">
            <p class="mb-0">
                Copyright © 2025 | Powered by <strong>eBook</strong> |
                Developed by 
                <a href="http://phenexsoft.com/" target="_blank" class="developer-link">Phenexsoft</a>
            </p>
        </div>
    </div>
</footer>
<style>

.site-footer a {
    color: #4da6ff;
    text-decoration: none;
}

.site-footer a:hover {
    color: #ffffff;
    text-decoration: underline;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
}




html, body {
    margin: 0;
    padding: 0;
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.site-footer {
    margin-top: auto; /* pushes footer to bottom */
    background-color: #0b1a34;
    color: #ffffff;
    padding: 40px 15px;
    text-align: center;
    border-top: 3px solid #2d529f;
}

@media (max-width: 768px) {
    body {
        /* Add space equal to bottom bar height so footer is not overlapped */
        padding-bottom: 80px; /* increase slightly if footer is taller */
    }

    .site-footer {
        padding: 30px 10px; /* keep mobile padding */
        margin-bottom: 50px; /* remove any extra margin */
    }

    .mobile-bottom-bar {
        display: flex !important;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
        padding: 0 10px;
        z-index: 9999;
    }
}

@media (max-width: 480px) {
    .site-footer {
        padding: 25px 8px;
        font-size: 13px;
    }
}

</style>