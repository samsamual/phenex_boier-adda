<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details - Boier Adda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        
        .blog-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0 50px;
            margin-bottom: 40px;
        }
        
        .blog-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            padding: 40px;
            margin-bottom: 30px;
        }
        
        .blog-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .blog-actions {
            display: flex;
            gap: 20px;
            margin: 30px 0;
            padding: 20px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }
        
        .action-btn {
            background: none;
            border: none;
            color: #666;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 8px;
        }
        
        .action-btn:hover {
            background: #f8f9fa;
            color: #333;
        }
        
        .action-btn.liked {
            color: #e74c3c;
        }
        
        .comments-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            padding: 40px;
            margin-bottom: 30px;
        }
        
        .comment {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #f8f9fa;
            border-left: 4px solid #667eea;
        }
        
        .reply {
            margin-left: 50px;
            background: #f1f3f4;
            border-left-color: #764ba2;
        }
        
        .comment-form, .reply-form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .like-count, .comment-count {
            font-weight: 600;
            margin-left: 5px;
        }
        
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }
        
        .tag {
            background: #e9ecef;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            color: #666;
        }
        
        .social-share {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            transform: translateY(-3px);
        }
        
        .facebook { background: #3b5998; }
        .twitter { background: #1da1f2; }
        .linkedin { background: #0077b5; }
        .pinterest { background: #bd081c; }
    </style>
</head>
<body>
    <!-- Blog Header -->
    <header class="blog-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">The Future of Web Development in 2024</h1>
                    <p class="lead mb-4">Exploring the latest trends and technologies shaping the future of web development</p>
                    <div class="d-flex justify-content-center align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="far fa-calendar"></i>
                            <span>September 23, 2025</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="far fa-clock"></i>
                            <span>5 min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Blog Content -->
                <article class="blog-content">
                    <div class="blog-meta">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face" alt="Author" class="author-img">
                        <div>
                            <h6 class="mb-1">John Doe</h6>
                            <p class="text-muted mb-0">Senior Web Developer</p>
                        </div>
                    </div>

                    <div class="blog-image mb-4">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&h=400&fit=crop" alt="Blog Image" class="img-fluid rounded-3">
                    </div>

                    <div class="blog-text">
                        <p class="lead">The landscape of web development is constantly evolving, with new technologies and frameworks emerging at a rapid pace. In this comprehensive guide, we'll explore the key trends that are shaping the future of web development in 2024.</p>
                        
                        <h3>The Rise of AI-Powered Development</h3>
                        <p>Artificial Intelligence is revolutionizing how we build websites and applications. From automated code generation to intelligent testing, AI tools are becoming indispensable for modern developers.</p>
                        
                        <h3>Progressive Web Apps (PWAs)</h3>
                        <p>PWAs continue to gain traction, offering native app-like experiences through web browsers. With offline capabilities and push notifications, they're changing how users interact with web applications.</p>
                        
                        <h3>Serverless Architecture</h3>
                        <p>The shift towards serverless computing allows developers to focus on writing code without worrying about infrastructure management. This approach offers scalability and cost-efficiency.</p>
                        
                        <p>As we move forward, staying updated with these trends will be crucial for any web developer looking to stay relevant in the industry.</p>
                    </div>

                    <!-- Blog Actions -->
                    <div class="blog-actions">
                        <button class="action-btn" id="likeBtn">
                            <i class="far fa-heart"></i>
                            <span class="like-count">42</span> Likes
                        </button>
                        <button class="action-btn">
                            <i class="far fa-comment"></i>
                            <span class="comment-count">15</span> Comments
                        </button>
                        <button class="action-btn">
                            <i class="fas fa-share-alt"></i> Share
                        </button>
                        <button class="action-btn">
                            <i class="far fa-bookmark"></i> Save
                        </button>
                    </div>

                    <!-- Tags -->
                    <div class="tags">
                        <span class="tag">Web Development</span>
                        <span class="tag">Technology</span>
                        <span class="tag">Programming</span>
                        <span class="tag">AI</span>
                        <span class="tag">PWAs</span>
                    </div>

                    <!-- Social Share -->
                    <div class="social-share">
                        <a href="#" class="social-icon facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-icon pinterest">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </div>
                </article>

                <!-- Comments Section -->
                <section class="comments-section">
                    <h3 class="mb-4">
                        <i class="far fa-comments me-2"></i>
                        Comments (<span class="comment-count">15</span>)
                    </h3>

                    <!-- Comment Form -->
                    <div class="comment-form">
                        <h5 class="mb-3">Leave a Comment</h5>
                        <form id="commentForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" class="form-control" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="5" placeholder="Your Comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    </div>

                    <!-- Comments List -->
                    <div class="comments-list">
                        <!-- Comment 1 -->
                        <div class="comment">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=50&h=50&fit=crop&crop=face" alt="User" class="author-img">
                                    <div>
                                        <h6 class="mb-1">Sarah Johnson</h6>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                </div>
                                <button class="action-btn reply-trigger">
                                    <i class="fas fa-reply"></i> Reply
                                </button>
                            </div>
                            <p class="mb-0">Great article! I've been working with PWAs for the past year, and they've completely transformed how we approach mobile development.</p>
                            
                            <!-- Reply Form (Hidden by default) -->
                            <div class="reply-form mt-3" style="display: none;">
                                <form class="reply-form-inner">
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3" placeholder="Write a reply..."></textarea>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Post Reply</button>
                                        <button type="button" class="btn btn-secondary btn-sm cancel-reply">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Reply to Comment 1 -->
                        <div class="comment reply">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=50&h=50&fit=crop&crop=face" alt="User" class="author-img">
                                    <div>
                                        <h6 class="mb-1">Mike Chen</h6>
                                        <small class="text-muted">1 hour ago</small>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0">@Sarah Johnson I completely agree! The performance improvements with PWAs are remarkable.</p>
                        </div>

                        <!-- Comment 2 -->
                        <div class="comment">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=50&h=50&fit=crop&crop=face" alt="User" class="author-img">
                                    <div>
                                        <h6 class="mb-1">Alex Rodriguez</h6>
                                        <small class="text-muted">5 hours ago</small>
                                    </div>
                                </div>
                                <button class="action-btn reply-trigger">
                                    <i class="fas fa-reply"></i> Reply
                                </button>
                            </div>
                            <p class="mb-0">The section on serverless architecture was particularly insightful. We've been migrating our infrastructure to serverless, and the cost savings have been substantial.</p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- About Author -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=120&h=120&fit=crop&crop=face" alt="Author" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                        <h5>John Doe</h5>
                        <p class="text-muted">Senior Web Developer with 8+ years of experience. Passionate about cutting-edge technologies and mentoring aspiring developers.</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-primary"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-primary"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-primary"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Related Posts -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="mb-0">Related Posts</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=80&h=80&fit=crop" alt="Related" class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h6 class="mb-1">React 18 Features You Should Know</h6>
                                <small class="text-muted">Sep 20, 2025</small>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=80&h=80&fit=crop" alt="Related" class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h6 class="mb-1">Building Scalable APIs with GraphQL</h6>
                                <small class="text-muted">Sep 18, 2025</small>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=80&h=80&fit=crop" alt="Related" class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h6 class="mb-1">Machine Learning for Web Developers</h6>
                                <small class="text-muted">Sep 15, 2025</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Like functionality
        document.getElementById('likeBtn').addEventListener('click', function() {
            const likeIcon = this.querySelector('i');
            const likeCount = this.querySelector('.like-count');
            
            if (this.classList.contains('liked')) {
                this.classList.remove('liked');
                likeIcon.className = 'far fa-heart';
                likeCount.textContent = parseInt(likeCount.textContent) - 1;
            } else {
                this.classList.add('liked');
                likeIcon.className = 'fas fa-heart';
                likeCount.textContent = parseInt(likeCount.textContent) + 1;
            }
        });

        // Reply functionality
        document.querySelectorAll('.reply-trigger').forEach(button => {
            button.addEventListener('click', function() {
                const replyForm = this.closest('.comment').querySelector('.reply-form');
                const isVisible = replyForm.style.display === 'block';
                
                // Hide all other reply forms
                document.querySelectorAll('.reply-form').forEach(form => {
                    form.style.display = 'none';
                });
                
                // Toggle current reply form
                replyForm.style.display = isVisible ? 'none' : 'block';
            });
        });

        // Cancel reply
        document.querySelectorAll('.cancel-reply').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.reply-form').style.display = 'none';
            });
        });

        // Comment form submission
        document.getElementById('commentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Comment posted successfully!');
            this.reset();
        });

        // Reply form submission
        document.querySelectorAll('.reply-form-inner').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Reply posted successfully!');
                this.reset();
                this.closest('.reply-form').style.display = 'none';
            });
        });
    </script>
</body>
</html>