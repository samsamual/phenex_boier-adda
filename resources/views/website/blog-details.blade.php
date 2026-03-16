@extends('frontend.layouts.ecommercemaster')
@section('title', "Blog Detail - " .env('APP_NAME'))

@section('content')
<main id="main" class="site-main">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        .main-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
            color: #667eea;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #667eea;
        }

        .navbar-nav .nav-link.active {
            color: #667eea;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            border-radius: 20px;
            padding: 8px 15px;
            border: 1px solid #ddd;
            width: 200px;
        }

        .search-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .auth-buttons .btn {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
        }

        /* Blog Header */
        .blog-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 120px 0 60px;
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

        /* Footer Styles */
        .main-footer {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 60px 0 20px;
            margin-top: 50px;
        }

        .footer-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-links h5 {
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
        }

        .footer-links ul li {
            margin-bottom: 10px;
        }

        .footer-links ul li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links ul li a:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #667eea;
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            color: #bdc3c7;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .newsletter-form input {
            flex: 1;
            border-radius: 25px;
            border: none;
            padding: 10px 20px;
        }

        .newsletter-form button {
            border-radius: 25px;
            border: none;
            background: #667eea;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>

    <!-- Blog Header -->
    <section class="blog-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-white">Blog</a></li>
                            {{--<li class="breadcrumb-item"><a href="#" class="text-white">Technology</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Current Post</li>--}}
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold mb-3">{{ $news->title }}</h1>
                    <!-- <p class="lead mb-4">Exploring the latest trends and technologies shaping the future of web development</p> -->
                    <div class="d-flex justify-content-center align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="far fa-calendar"></i>
                            <span>{{ $news->created_at->format('F d, Y') }}</span>
                        </div>
                        {{--<div class="d-flex align-items-center gap-2">
                            <i class="far fa-clock"></i>
                            <span>5 min read</span>
                        </div>--}}
                        <div class="d-flex align-items-center gap-2">
                            <i class="far fa-eye"></i>
                            <span>{{ $news->view_count }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Blog Content -->
                <article class="blog-content">
                    <div class="blog-meta">
                        <img src="{{ asset('frontend/img/user.png') }}" alt="Author" class="author-img">
                        <div>
                            <h6 class="mb-1">{{ $news->addedBy->name ?? 'User' }}</h6>
                            <p class="text-muted mb-0">{{ 'Writer' }}</p>
                        </div>
                    </div>

                    <div class="blog-image mb-4">
                        <img src="{{ asset('uslive/cpmd/' . $news->fi()) }}" alt="Blog Image" class="img-fluid rounded-3">
                    </div>

                    <div class="blog-text">
                        {!! $news->description !!}
                        {{--<p class="lead">The landscape of web development is constantly evolving, with new technologies and frameworks emerging at a rapid pace. In this comprehensive guide, we'll explore the key trends that are shaping the future of web development in 2024.</p>
                        
                        <h3>The Rise of AI-Powered Development</h3>
                        <p>Artificial Intelligence is revolutionizing how we build websites and applications. From automated code generation to intelligent testing, AI tools are becoming indispensable for modern developers.</p>
                        
                        <h3>Progressive Web Apps (PWAs)</h3>
                        <p>PWAs continue to gain traction, offering native app-like experiences through web browsers. With offline capabilities and push notifications, they're changing how users interact with web applications.</p>
                        
                        <h3>Serverless Architecture</h3>
                        <p>The shift towards serverless computing allows developers to focus on writing code without worrying about infrastructure management. This approach offers scalability and cost-efficiency.</p>
                        
                        <p>As we move forward, staying updated with these trends will be crucial for any web developer looking to stay relevant in the industry.</p>--}}
                    </div>

                    <!-- Blog Actions -->
                    <div class="blog-actions">
                        <button class="action-btn" id="likeBtn" data-post-id="{{ $news->id }}">
                            <i class="far fa-heart"></i>
                            <span class="like-count">{{ $news->likes_count }}</span> Likes
                        </button>
                        <button class="action-btn">
                            <i class="far fa-comment"></i>
                            <span class="comment-count">{{ $news->comments->count() }}</span> Comments
                        </button>

                        <button class="action-btn">
                            <i class="fas fa-share-alt"></i> Share
                        </button>
                        <button class="action-btn">
                            <i class="far fa-bookmark"></i> Save
                        </button>
                    </div>

                    <!-- Tags -->
                    {{--<div class="tags">
                        <span class="tag">Web Development</span>
                        <span class="tag">Technology</span>
                        <span class="tag">Programming</span>
                        <span class="tag">AI</span>
                        <span class="tag">PWAs</span>
                    </div>--}}

                    <!-- Social Share -->
                    <div class="social-share">
                        <span class="text-muted">Share this post:</span>
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
                        Comments (<span class="comment-count">{{ $news->comments->count() }}</span>)
                    </h3>

                    <!-- Comment Form -->
                    <div class="comment-form">
                        <h5 class="mb-3">Leave a Comment</h5>
                             {{-- Comment Form --}}
                        <form action="{{ route('blog.comment.store', $news->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea name="comment" class="form-control" rows="5" placeholder="Your Comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>

                    </div>

                    <!-- Comments List -->
                    {{--<div class="comments-list">
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
                    </div>--}}

<!-- sdjhjsdhf jshfjhsa jfhsjf hjasdfhjdashfjsdhafjajsd  -->

<div class="comments-list mt-4">
    @foreach($news->comments as $comment)
        <div class="comment mb-4">
            <!-- Comment header -->
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ asset('frontend/img/user.png') }}" 
                         alt="User" class="author-img rounded-circle" width="50" height="50">
                    <div>
                        <h6 class="mb-1">{{ $comment->name }}</h6>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <button type="button" class="action-btn reply-trigger btn btn-sm btn-light">
                    <i class="fas fa-reply"></i> Reply
                </button>
            </div>

            <!-- Comment body -->
            <p class="mb-0">{{ $comment->comment }}</p>

            <!-- Replies -->
            @foreach($comment->replies as $reply)
                <div class="comment reply ms-5 mt-3 border-start ps-3">
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <img src="{{ asset('frontend/img/user.png') }}" 
                             alt="User" class="author-img rounded-circle" width="45" height="45">
                        <div>
                            <h6 class="mb-1">{{ $reply->name }}</h6>
                            <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <p class="mb-0">{{ $reply->comment }}</p>
                </div>
            @endforeach

            <!-- Reply Form (hidden by default) -->
            <div class="reply-form mt-3" style="display: none;">
                <form action="{{ route('blog.comment.store', $news->id) }}" method="POST" class="reply-form-inner">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div class="mb-3">
                        <textarea name="comment" class="form-control" rows="3" placeholder="Write a reply..."></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-sm">Post Reply</button>
                        <button type="button" class="btn btn-secondary btn-sm cancel-reply">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>

                    <!-- msdhfjsdhfj hsjfhjksd hfjshfjsdhafjhdasjfhjsdfha   -->
                </section>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- About Author -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center">
                        <img src="{{ asset('frontend/img/user.png') }}" alt="Author" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                        <h5>{{ $news->addedBy->name ?? 'User' }}</h5>
                        <p class="text-muted">{{ $news->short_bio ?? 'I am exciting to work and make content ' }}</p>
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
                        @foreach($relatedPosts as $related)
                        <div class="d-flex gap-3 mb-3">
                            <img src="{{ asset('uslive/cpmd/' . $related->fi()) }}" alt="{{ $related->title }}" class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h6 class="mb-1">{{ $related->title }}</h6>
                                <small class="text-muted">{{ $related->created_at->format('M d, Y') }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- #colophon -->

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
    <script>
    document.getElementById('likeBtn').addEventListener('click', function() {
        const postId = this.getAttribute('data-post-id');
        fetch(`/blog/${postId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
        })
        .then(res => res.json())
        .then(data => {
            this.querySelector('.like-count').innerText = data.likes;
        });
    });
    </script>

</main>

@endsection


