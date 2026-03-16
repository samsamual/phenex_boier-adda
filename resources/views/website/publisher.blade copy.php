<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Publisher - eBook</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Header styles */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px 0;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            color: #1e293b;
            margin-bottom: 10px;
        }
        
        .page-header p {
            font-size: 1.1rem;
            color: #64748b;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Publisher grid styles */
        .publishers-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 25px;
        }
        
        .publisher-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }
        
        .publisher-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .publisher-logo {
            width: 120px;
            height: 120px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .publisher-logo img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .publisher-info {
            width: 100%;
        }
        
        .publisher-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }
        
        .publisher-name a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        
        .publisher-name a:hover {
            color: #046bd2;
        }
        
        .publisher-description {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* Responsive design */
        @media (max-width: 1200px) {
            .publishers-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        @media (max-width: 992px) {
            .publishers-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .publishers-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .publisher-logo {
                width: 100px;
                height: 100px;
            }
        }
        
        @media (max-width: 480px) {
            .publishers-grid {
                grid-template-columns: 1fr;
            }
            
            .page-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Our All Publishers</h1>
            <p>Discover the publishing houses that bring you the best books and content</p>
        </header>
        
        <div class="publishers-grid">
            <!-- Publisher 1 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/babui-prokashoni/index.html">
                        <img src="../wp-content/uploads/2025/08/f830ff94-2d13-4b31-90a1-79c1325e1eb2_lg-1.jpg" alt="Babui Prokashoni Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/babui-prokashoni/index.html">Babui Prokashoni</a>
                    </h2>
                    <p class="publisher-description">A leading publisher known for quality literature and educational materials.</p>
                </div>
            </div>
            
            <!-- Publisher 2 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/borno-prokash-ltd/index.html">
                        <img src="../wp-content/uploads/2025/08/4e7f92b3-ead0-430e-8221-87fb543f91be_lg.jpg" alt="Borno Prokash Ltd Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/borno-prokash-ltd/index.html">Borno Prokash Ltd</a>
                    </h2>
                    <p class="publisher-description">Specializing in academic and research publications with a focus on innovation.</p>
                </div>
            </div>
            
            <!-- Publisher 3 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/dyu-publications/index.html">
                        <img src="../wp-content/uploads/2025/08/6ad91e22-a7a3-40c4-b969-421648345d55_lg.jpg" alt="Dyu Publications Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/dyu-publications/index.html">Dyu Publications</a>
                    </h2>
                    <p class="publisher-description">Bringing creative and engaging content to readers of all ages.</p>
                </div>
            </div>
            
            <!-- Publisher 4 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/dhaka-comics-publications/index.html">
                        <img src="../wp-content/uploads/2025/08/7e96b250-43f6-4c70-9a8b-b8f3b9efc864_lg.jpg" alt="Dhaka Comics Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/dhaka-comics-publications/index.html">Dhaka Comics</a>
                    </h2>
                    <p class="publisher-description">The home of captivating visual storytelling and graphic novels.</p>
                </div>
            </div>
            
            <!-- Publisher 5 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/gurdian-publications/index.html">
                        <img src="../wp-content/uploads/2025/08/36ef7fda-b6ab-403a-93d8-f87ebc414278_lg.jpg" alt="Gurdian Publications Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/gurdian-publications/index.html">Gurdian Publications</a>
                    </h2>
                    <p class="publisher-description">Trusted source for informative and thought-provoking publications.</p>
                </div>
            </div>
            
            <!-- Publisher 6 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/mohakal-publications/index.html">
                        <img src="../wp-content/uploads/2025/08/4369062a-d32d-4bbf-a4f5-f2268c72b04f_lg.jpg" alt="Mohakal Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/mohakal-publications/index.html">Mohakal</a>
                    </h2>
                    <p class="publisher-description">Publishing contemporary literature with cultural significance.</p>
                </div>
            </div>
            
            <!-- Publisher 7 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/chayabithi-publications/index.html">
                        <img src="../wp-content/uploads/2025/08/b1774614-60a8-4d95-af04-e6d1b46d7ec9_lg.jpg" alt="Chhayabithi Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/chayabithi-publications/index.html">Chhayabithi</a>
                    </h2>
                    <p class="publisher-description">Creating literary works that inspire imagination and creativity.</p>
                </div>
            </div>
            
            <!-- Publisher 8 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <img src="../wp-content/uploads/2025/08/a645c473-0661-48f5-b586-d648f44f09a3_lg.jpg" alt="Poroprokash Logo">
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">Poroprokash</h2>
                    <p class="publisher-description">Dedicated to publishing works that expand knowledge and understanding.</p>
                </div>
            </div>
            
            <!-- Publisher 9 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <a href="../product-tag/sucheepatra-publications/index.html">
                        <img src="../wp-content/uploads/2025/08/e2d45dd0-f83a-4877-a528-4f4d21e0bfa8_lg.jpg" alt="Sucheepatra Logo">
                    </a>
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">
                        <a href="../product-tag/sucheepatra-publications/index.html">Sucheepatra</a>
                    </h2>
                    <p class="publisher-description">Bringing quality reading materials to enthusiastic readers.</p>
                </div>
            </div>
            
            <!-- Publisher 10 -->
            <div class="publisher-card">
                <div class="publisher-logo">
                    <img src="../wp-content/uploads/2025/08/1021f6a9-abaf-439a-a785-352b43670a2e_lg-1.jpg" alt="Golpomoy Logo">
                </div>
                <div class="publisher-info">
                    <h2 class="publisher-name">Golpomoy</h2>
                    <p class="publisher-description">Specializing in storytelling and narrative-driven publications.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>