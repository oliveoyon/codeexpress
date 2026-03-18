@extends('layouts.site')

@section('title', 'CodeExpress | From Concept to Code')
@section('meta_description', 'CodeExpress delivers scalable, secure, and high-performance software solutions for organizations worldwide.')
@section('theme_color', '#0A2540')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
<main id="home">
    <section class="hero">
      <div class="container hero-grid">
        <div class="reveal active">
          <span class="eyebrow">Global Software Delivery</span>
          <h1>Digital solutions with speed and precision.</h1>
          <p>
            CodeExpress builds scalable software platforms, enterprise systems, and
            data-driven applications for organizations that expect modern technology,
            reliable execution, and measurable impact.
          </p>

          <div class="hero-badges" aria-label="Delivery strengths">
            <span class="smart-badge orange">Fast kickoff</span>
            <span class="smart-badge blue">Clear scope</span>
            <span class="smart-badge green">Reliable delivery</span>
          </div>

          <div class="btn-group">
            <a href="#contact" class="btn btn-primary">Get Started</a>
            <a href="#services" class="btn btn-secondary">Explore Services</a>
          </div>

          <div class="hero-meta">
            <div class="hero-meta-item">
              <span class="hero-meta-dot"></span>
              <span>Custom Software Development</span>
            </div>
            <div class="hero-meta-item">
              <span class="hero-meta-dot"></span>
              <span>Enterprise Systems</span>
            </div>
            <div class="hero-meta-item">
              <span class="hero-meta-dot"></span>
              <span>Digital Process Transformation</span>
            </div>
          </div>
        </div>

        <div class="hero-card-wrap reveal">
          <div class="floating-badge badge-one">Fast delivery. Enterprise quality.</div>
          <div class="floating-badge badge-two">Scalable systems</div>

          <div class="hero-card">
            <div class="hero-card-top">
              <span></span>
              <span></span>
              <span></span>
            </div>

            <div class="hero-card-body">
              <div class="dashboard-panel">
                <small>Project Delivery Dashboard</small>
                <h3>From concept to scale.</h3>
                <p>
                  Structured execution, modern architecture, and dependable delivery
                  for organizations operating in dynamic environments.
                </p>
              </div>

              <div class="mini-grid">
                <div class="mini-card">
                  <span class="label">Architecture</span>
                  <strong>Cloud-Ready</strong>
                  <p>Designed for performance, flexibility, and long-term maintainability.</p>
                </div>
                <div class="mini-card">
                  <span class="label">Approach</span>
                  <strong>User-Focused</strong>
                  <p>Built around real workflows, operational needs, and measurable outcomes.</p>
                </div>
                <div class="mini-card">
                  <span class="label">Delivery</span>
                  <strong>Agile</strong>
                  <p>Fast iteration with quality assurance, transparency, and control.</p>
                </div>
                <div class="mini-card">
                  <span class="label">Reliability</span>
                  <strong>Secure</strong>
                  <p>Structured systems with attention to integrity, privacy, and resilience.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="trusted section-sm">
      <div class="container trusted-grid">
        <div class="trusted-copy">
          <span class="trusted-kicker">Trusted Across Sectors</span>
          <h2>Built for dependable digital execution.</h2>
          <p>CodeExpress supports mission-driven teams, operationally complex organizations, and growing institutions with software built for clarity, resilience, and real adoption.</p>
          <div class="trusted-points">
            <span class="trusted-point">Delivery-minded</span>
            <span class="trusted-point">Sector-aware</span>
            <span class="trusted-point">Long-term value</span>
          </div>
        </div>
        <div class="logo-list">
          <div class="logo-item"><span>Complex systems</span><strong>Enterprise</strong></div>
          <div class="logo-item"><span>Service delivery</span><strong>Public Sector</strong></div>
          <div class="logo-item"><span>Impact programs</span><strong>NGO / INGO</strong></div>
          <div class="logo-item"><span>Learning platforms</span><strong>Education</strong></div>
          <div class="logo-item"><span>Workflow improvement</span><strong>Operations</strong></div>
        </div>
      </div>
    </section>

    <section class="section" id="about">
      <div class="container about-grid">
        <div class="section-header reveal">
          <span class="eyebrow">About CodeExpress</span>
          <h2>Technology shaped by real operations.</h2>
          <p>
            We combine software engineering, systems thinking, and delivery discipline
            to help organizations move from manual complexity to structured digital execution.
          </p>
        </div>

        <div class="content-card reveal">
          <h3>Built for real delivery</h3>
          <p>
            CodeExpress is a software development company focused on building secure,
            scalable, and high-performance digital solutions for modern organizations.
          </p>
          <p>
            We design and deliver software that improves operations, strengthens visibility,
            supports decision-making, and creates a more reliable digital foundation for growth.
          </p>
          <p>
            Our work emphasizes clarity in planning, quality in execution, and practical systems
            that work in real-world environments.
          </p>

          <div class="metric-list">
            <div class="metric">
              <strong>01</strong>
              <span>Custom-built systems for unique operational needs</span>
            </div>
            <div class="metric">
              <strong>02</strong>
              <span>Modern delivery approach with speed and structure</span>
            </div>
            <div class="metric">
              <strong>03</strong>
              <span>Scalable foundations for long-term digital growth</span>
            </div>
            <div class="metric">
              <strong>04</strong>
              <span>User-centered systems with practical business value</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="services" style="background: var(--bg-soft);">
      <div class="container">
        <div class="section-header reveal">
          <span class="eyebrow">Services</span>
          <h2>What we build and improve.</h2>
          <p>
            End-to-end software services focused on performance, maintainability,
            and long-term business utility.
          </p>
        </div>

        <div class="services-grid">
          <article class="service-card reveal">
            <div class="card-top">
              <div class="icon-box">&#8599;</div>
              <span class="card-badge orange">Build</span>
            </div>
            <h3>Custom Software</h3>
            <p>
              Tailored web platforms, business systems, and enterprise applications
              built around specific workflows, users, and strategic goals.
            </p>
            <div class="card-action">
              <a href="#contact" class="btn btn-ghost">Plan This Service</a>
            </div>
          </article>

          <article class="service-card reveal">
            <div class="card-top">
              <div class="icon-box">&#9707;</div>
              <span class="card-badge blue">Connect</span>
            </div>
            <h3>Architecture & Integration</h3>
            <p>
              Robust architecture design and seamless integration across tools, databases,
              APIs, and operational platforms for smooth and connected execution.
            </p>
            <div class="card-action">
              <a href="#contact" class="btn btn-ghost">Plan This Service</a>
            </div>
          </article>

          <article class="service-card reveal">
            <div class="card-top">
              <div class="icon-box">&#9635;</div>
              <span class="card-badge green">Insight</span>
            </div>
            <h3>Data & Dashboards</h3>
            <p>
              Intelligent dashboards and reporting environments that transform operational
              data into visibility, oversight, and actionable insight.
            </p>
            <div class="card-action">
              <a href="#contact" class="btn btn-ghost">Plan This Service</a>
            </div>
          </article>

          <article class="service-card reveal">
            <div class="card-top">
              <div class="icon-box">&#9881;</div>
              <span class="card-badge purple">Optimize</span>
            </div>
            <h3>Process Digitization</h3>
            <p>
              Structured digital transformation of manual, paper-based, or fragmented
              processes into streamlined and traceable workflows.
            </p>
            <div class="card-action">
              <a href="#contact" class="btn btn-ghost">Plan This Service</a>
            </div>
          </article>

          <article class="service-card reveal">
            <div class="card-top">
              <div class="icon-box">&#9673;</div>
              <span class="card-badge red">Upgrade</span>
            </div>
            <h3>App Modernization</h3>
            <p>
              Enhancement of existing systems through redesign, performance improvement,
              security hardening, and feature evolution for current business demands.
            </p>
            <div class="card-action">
              <a href="#contact" class="btn btn-ghost">Plan This Service</a>
            </div>
          </article>

          <article class="service-card reveal">
            <div class="card-top">
              <div class="icon-box">&#9776;</div>
              <span class="card-badge gold">Support</span>
            </div>
            <h3>Maintenance & Support</h3>
            <p>
              Ongoing support, optimization, monitoring, and issue resolution to keep
              critical systems stable, reliable, and ready to scale.
            </p>
            <div class="card-action">
              <a href="#contact" class="btn btn-ghost">Plan This Service</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="section" id="portfolio">
      <div class="container">
        <div class="section-header reveal">
          <span class="eyebrow">Portfolio</span>
          <h2>Products we have designed and built.</h2>
          <p>
            A selection of digital products developed by CodeExpress, presented to show the
            kind of platforms, systems, and interfaces we create for modern organizations.
          </p>
        </div>

        <div class="portfolio-showcase">
          <div class="portfolio-lead">
            <article class="portfolio-visual reveal">
              <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80" alt="Team reviewing a digital product dashboard in a modern workspace">
              <div class="portfolio-overlay">
                <span class="portfolio-status">Featured Product</span>
                <h3>Operations and reporting platform built for distributed teams.</h3>
              </div>
            </article>

            <article class="portfolio-summary reveal">
              <span class="portfolio-kicker">Product Showcase</span>
              <h3>Enterprise systems developed to improve visibility, coordination, and delivery.</h3>
              <p>
                Our work includes internal platforms, service dashboards, workflow systems,
                and operational tools designed to help organizations run with more clarity and control.
              </p>

              <div class="portfolio-metrics">
                <div class="portfolio-metric">
                  <strong>10+</strong>
                  <span>Modules across one product ecosystem</span>
                </div>
                <div class="portfolio-metric">
                  <strong>24/7</strong>
                  <span>Access to business-critical information</span>
                </div>
                <div class="portfolio-metric">
                  <strong>1</strong>
                  <span>Unified product experience</span>
                </div>
              </div>

              <div class="portfolio-points">
                <div class="portfolio-point">Products are built around real workflows, user roles, and operational constraints.</div>
                <div class="portfolio-point">Interfaces balance executive visibility with practical day-to-day usability.</div>
                <div class="portfolio-point">Architecture decisions prioritize maintainability, scalability, and long-term product value.</div>
              </div>
            </article>
          </div>

          <div class="portfolio-grid">
            <article class="portfolio-card reveal">
              <div class="portfolio-card-image">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80" alt="Students collaborating with digital learning tools">
              </div>
              <div class="portfolio-card-body">
                <div class="portfolio-card-top">
                  <div>
                    <span class="portfolio-product-label">Education Product</span>
                    <h3>Learning Management System</h3>
                  </div>
                  <div class="portfolio-product-icon">&#9998;</div>
                </div>
                <p>
                  A digital learning platform for courses, assessments, progress tracking, and student communication.
                </p>
                <div class="portfolio-tags">
                  <span class="portfolio-tag">Courses</span>
                  <span class="portfolio-tag">Assessments</span>
                  <span class="portfolio-tag">Student portal</span>
                </div>
                <span class="portfolio-note">Built for structured digital learning delivery</span>
              </div>
            </article>

            <article class="portfolio-card reveal">
              <div class="portfolio-card-image">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=900&q=80" alt="Restaurant team using a digital ordering and management system">
              </div>
              <div class="portfolio-card-body">
                <div class="portfolio-card-top">
                  <div>
                    <span class="portfolio-product-label">Restaurant Product</span>
                    <h3>Restaurant Management System</h3>
                  </div>
                  <div class="portfolio-product-icon">&#127869;</div>
                </div>
                <p>
                  An integrated restaurant solution for menu management, table service, kitchen flow, and order tracking.
                </p>
                <div class="portfolio-tags">
                  <span class="portfolio-tag">POS</span>
                  <span class="portfolio-tag">Kitchen queue</span>
                  <span class="portfolio-tag">Order flow</span>
                </div>
                <span class="portfolio-note">Designed for smoother service operations</span>
              </div>
            </article>

            <article class="portfolio-card reveal">
              <div class="portfolio-card-image">
                <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=900&q=80" alt="Customer browsing products in an e-commerce interface">
              </div>
              <div class="portfolio-card-body">
                <div class="portfolio-card-top">
                  <div>
                    <span class="portfolio-product-label">Commerce Product</span>
                    <h3>Ecommerce Solution</h3>
                  </div>
                  <div class="portfolio-product-icon">&#128722;</div>
                </div>
                <p>
                  A scalable online commerce platform for catalog management, orders, payments, and customer accounts.
                </p>
                <div class="portfolio-tags">
                  <span class="portfolio-tag">Catalog</span>
                  <span class="portfolio-tag">Payments</span>
                  <span class="portfolio-tag">Customer portal</span>
                </div>
                <span class="portfolio-note">Built for modern digital retail experiences</span>
              </div>
            </article>

            <article class="portfolio-card reveal">
              <div class="portfolio-card-image">
                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=900&q=80" alt="Accounting workspace with invoices and financial reporting screens">
              </div>
              <div class="portfolio-card-body">
                <div class="portfolio-card-top">
                  <div>
                    <span class="portfolio-product-label">Finance Product</span>
                    <h3>Accounting & Invoicing System</h3>
                  </div>
                  <div class="portfolio-product-icon">&#128179;</div>
                </div>
                <p>
                  A financial operations product covering invoices, payments, ledger tracking, and reporting visibility.
                </p>
                <div class="portfolio-tags">
                  <span class="portfolio-tag">Invoices</span>
                  <span class="portfolio-tag">Payments</span>
                  <span class="portfolio-tag">Finance reports</span>
                </div>
                <span class="portfolio-note">Built for cleaner financial control</span>
              </div>
            </article>

            <article class="portfolio-card reveal">
              <div class="portfolio-card-image">
                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80" alt="HR team managing payroll and people records on a digital system">
              </div>
              <div class="portfolio-card-body">
                <div class="portfolio-card-top">
                  <div>
                    <span class="portfolio-product-label">People Product</span>
                    <h3>HR & Payroll Platform</h3>
                  </div>
                  <div class="portfolio-product-icon">&#128188;</div>
                </div>
                <p>
                  A workforce platform for employee records, attendance, payroll processing, and leave management.
                </p>
                <div class="portfolio-tags">
                  <span class="portfolio-tag">HR records</span>
                  <span class="portfolio-tag">Payroll</span>
                  <span class="portfolio-tag">Attendance</span>
                </div>
                <span class="portfolio-note">Built to simplify internal people operations</span>
              </div>
            </article>

            <article class="portfolio-card reveal">
              <div class="portfolio-card-image">
                <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80" alt="Warehouse inventory and logistics operations managed digitally">
              </div>
              <div class="portfolio-card-body">
                <div class="portfolio-card-top">
                  <div>
                    <span class="portfolio-product-label">Operations Product</span>
                    <h3>Inventory & Warehouse System</h3>
                  </div>
                  <div class="portfolio-product-icon">&#128230;</div>
                </div>
                <p>
                  A stock and warehouse management product for item control, movement tracking, and supply visibility.
                </p>
                <div class="portfolio-tags">
                  <span class="portfolio-tag">Inventory</span>
                  <span class="portfolio-tag">Stock movement</span>
                  <span class="portfolio-tag">Warehouse ops</span>
                </div>
                <span class="portfolio-note">Built for reliable operational traceability</span>
              </div>
            </article>

          </div>
          <div class="section-actions reveal">
            <a href="portfolio.html" class="btn show-more-btn">Show More</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="why">
      <div class="container">
        <div class="section-header reveal">
          <span class="eyebrow">Why CodeExpress</span>
          <h2>Built for speed, quality, and accountability.</h2>
          <p>
            We focus on disciplined execution, scalable engineering, and software
            that creates practical value beyond launch.
          </p>
        </div>

        <div class="features-grid">
          <article class="feature-card reveal">
            <div class="icon-box">&#9889;</div>
            <h3>Structured Speed</h3>
            <p>
              Fast delivery supported by thoughtful planning, strong technical standards,
              and careful execution.
            </p>
          </article>

          <article class="feature-card reveal">
            <div class="icon-box">&#9678;</div>
            <h3>Scalable by Design</h3>
            <p>
              Systems are architected to adapt, grow, and remain maintainable as needs evolve.
            </p>
          </article>

          <article class="feature-card reveal">
            <div class="icon-box">&#10003;</div>
            <h3>Reliable Execution</h3>
            <p>
              Delivery built around clarity, consistency, documentation, and operational trust.
            </p>
          </article>

          <article class="feature-card reveal">
            <div class="icon-box">&#9677;</div>
            <h3>User-Centered Design</h3>
            <p>
              Interfaces and workflows designed to support the people who use them every day.
            </p>
          </article>

          <article class="feature-card reveal">
            <div class="icon-box">&#8734;</div>
            <h3>End-to-End Delivery</h3>
            <p>
              From discovery and design to build, deployment, and enhancement, handled with continuity.
            </p>
          </article>

          <article class="feature-card reveal">
            <div class="icon-box">&#9670;</div>
            <h3>Practical by Design</h3>
            <p>
              Technology choices are grounded in usability, sustainability, and actual operational context.
            </p>
          </article>
        </div>
      </div>
    </section>

    <section class="section" id="technology" style="background: var(--bg-soft);">
      <div class="container stack-wrap">
        <div class="section-header reveal">
          <span class="eyebrow">Technology</span>
          <h2>Modern tech for resilient products.</h2>
          <p>
            We use proven frameworks, scalable back-end technologies, and flexible
            integration patterns to support reliable software delivery.
          </p>
        </div>

        <div class="stack-card reveal">
          <h3>Core Stack</h3>
          <p style="margin-bottom: 18px;">
            Adaptable, secure, and performance-oriented technologies aligned with
            modern application development and enterprise delivery needs.
          </p>

          <div class="stack-tags">
            <span class="tag">Laravel</span>
            <span class="tag">PHP</span>
            <span class="tag">MySQL</span>
            <span class="tag">JavaScript</span>
            <span class="tag">REST API</span>
            <span class="tag">Progressive Web App</span>
            <span class="tag">Cloud Infrastructure</span>
            <span class="tag">System Integration</span>
            <span class="tag">Dashboard & Reporting</span>
            <span class="tag">Mobile Connectivity</span>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-header reveal">
          <span class="eyebrow">Our Process</span>
          <h2>Our 4D delivery principle.</h2>
          <p>
            We follow the 4D principle, a clear delivery model built around Discover,
            Design, Develop, and Deploy for structured execution from start to launch.
          </p>
        </div>

        <div class="process-grid">
          <article class="process-card reveal">
            <div class="step">01</div>
            <h3>Discover</h3>
            <p>
              Understand business goals, operational pain points, user needs, and system expectations.
            </p>
          </article>

          <article class="process-card reveal">
            <div class="step">02</div>
            <h3>Design</h3>
            <p>
              Shape architecture, workflows, interfaces, and delivery priorities with clarity.
            </p>
          </article>

          <article class="process-card reveal">
            <div class="step">03</div>
            <h3>Develop</h3>
            <p>
              Build secure, maintainable, and scalable software with structured iteration.
            </p>
          </article>

          <article class="process-card reveal">
            <div class="step">04</div>
            <h3>Deploy</h3>
            <p>
              Launch with confidence and continue with monitoring, refinement, and support.
            </p>
          </article>
        </div>
      </div>
    </section>

    <section class="section" id="newsletter" style="background: var(--bg-soft);">
      <div class="container">
        <div class="newsletter-shell">
          <div class="newsletter-head">
            <div class="section-header reveal" style="margin-bottom: 0;">
              <span class="eyebrow">Newsletter</span>
              <h2>Insights, product thinking, and digital updates.</h2>
              <p>
                A static listing for now, designed as the future home for articles, updates,
                product notes, and delivery insights from CodeExpress.
              </p>
            </div>
            <a href="#contact" class="btn btn-secondary reveal">Subscribe Later</a>
          </div>

          <div class="newsletter-grid">
            <article class="newsletter-card reveal">
              <div class="newsletter-image">
                <img src="https://images.unsplash.com/photo-1516321165247-4aa89a48be28?auto=format&fit=crop&w=900&q=80" alt="Team reviewing digital product strategy and content planning">
              </div>
              <div class="newsletter-body">
                <div class="newsletter-meta">
                  <span class="newsletter-date">March 2026</span>
                  <span class="card-badge blue">Product Update</span>
                </div>
                <h3>Designing software around real operational workflows</h3>
                <p>
                  A short look at how workflow mapping improves product clarity, usability, and delivery outcomes.
                </p>
                <a href="#contact" class="newsletter-link">Read article</a>
              </div>
            </article>

            <article class="newsletter-card reveal">
              <div class="newsletter-image">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80" alt="Analytics dashboard and reporting interface on a laptop screen">
              </div>
              <div class="newsletter-body">
                <div class="newsletter-meta">
                  <span class="newsletter-date">March 2026</span>
                  <span class="card-badge green">Insight</span>
                </div>
                <h3>Why reporting dashboards fail without decision context</h3>
                <p>
                  Better dashboards come from understanding the decisions teams need to make, not only the data they store.
                </p>
                <a href="#contact" class="newsletter-link">Read article</a>
              </div>
            </article>

            <article class="newsletter-card reveal">
              <div class="newsletter-image">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80" alt="Developers working on a modern software platform">
              </div>
              <div class="newsletter-body">
                <div class="newsletter-meta">
                  <span class="newsletter-date">March 2026</span>
                  <span class="card-badge orange">Engineering</span>
                </div>
                <h3>Modernizing business platforms without breaking continuity</h3>
                <p>
                  A practical view on upgrading legacy systems while preserving service continuity and long-term maintainability.
                </p>
                <a href="#contact" class="newsletter-link">Read article</a>
              </div>
            </article>

          </div>
          <div class="section-actions reveal">
            <a href="newsletter.html" class="btn show-more-btn">Show More</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="cta reveal" id="contact">
          <div class="cta-grid">
            <div>
              <span class="eyebrow" style="background: rgba(255,255,255,0.12); color: #fff;">Start a Conversation</span>
              <h2>Build software that moves you forward.</h2>
              <p>
                Whether you are launching a new platform, modernizing an existing system,
                or improving operational visibility, CodeExpress is ready to help you
                translate complexity into reliable digital execution.
              </p>

              <div class="contact-points">
                <span class="contact-point">Enterprise-ready delivery</span>
                <span class="contact-point">Clear project scoping</span>
                @if($generalSetting?->email)
                <span class="contact-point">{{ $generalSetting->email }}</span>
                @endif
                @if($generalSetting?->phone)
                <span class="contact-point">{{ $generalSetting->phone }}</span>
                @endif
                @if($generalSetting?->address)
                <span class="contact-point">{{ $generalSetting->address }}</span>
                @endif
              </div>
            </div>

            <div class="cta-panel">
              <div class="cta-panel-head">
                <span class="smart-badge orange">Discovery ready</span>
                <span class="smart-badge blue">Response-focused</span>
              </div>
                            @if(session('contact_success'))
              <div class="contact-feedback success">{{ session('contact_success') }}</div>
              @endif

              @if ($errors->any())
              <div class="contact-feedback error">Please review the form and fix the highlighted fields.</div>
              @endif

              <form class="contact-form" action="{{ route('contact-inquiries.store') }}#contact" method="post">
                @csrf
                <div class="form-grid">
                  <div class="field">
                    <label for="contact-name">Name</label>
                    <input id="contact-name" name="name" type="text" value="{{ old('name') }}" placeholder="Your full name" required>
                    @error('name')
                    <span class="field-error">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="field">
                    <label for="contact-email">Email</label>
                    <input id="contact-email" name="email" type="email" value="{{ old('email') }}" placeholder="you@company.com" required>
                    @error('email')
                    <span class="field-error">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="field">
                    <label for="contact-phone">Phone</label>
                    <input id="contact-phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="Optional phone number">
                    @error('phone')
                    <span class="field-error">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="field">
                    <label for="contact-subject">Subject</label>
                    <input id="contact-subject" name="subject" type="text" value="{{ old('subject') }}" placeholder="What do you need help with?" required>
                    @error('subject')
                    <span class="field-error">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="field field-full">
                    <label for="contact-message">Your Message</label>
                    <textarea id="contact-message" name="message" placeholder="Tell us what you are building, improving, or planning." required>{{ old('message') }}</textarea>
                    @error('message')
                    <span class="field-error">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="contact-form-actions">
                  <button type="submit" class="btn btn-primary">Send Inquiry</button>
                  <p class="form-note">Your message will go directly to the admin inquiry inbox for review and follow-up.</p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@push('scripts')
    <script>
const mobileToggle = document.getElementById("mobileToggle");
    const mobileMenu = document.getElementById("mobileMenu");
    const internalLinks = document.querySelectorAll('a[href^="#"]');
    const sectionLinks = document.querySelectorAll('.nav-links a[href^="#"], .nav-menu a[href^="#"]');
    const trackedSections = [...sectionLinks]
      .map((link) => document.querySelector(link.getAttribute("href")))
      .filter(Boolean);

    mobileToggle.addEventListener("click", function () {
      const expanded = this.getAttribute("aria-expanded") === "true";
      this.setAttribute("aria-expanded", !expanded);
      mobileMenu.classList.toggle("active");
    });

    internalLinks.forEach((link) => {
      const targetSelector = link.getAttribute("href");
      const target = targetSelector ? document.querySelector(targetSelector) : null;
      if (!target) return;

      link.addEventListener("click", (event) => {
        event.preventDefault();

        const headerOffset = 96;
        const targetTop = target.getBoundingClientRect().top + window.scrollY - headerOffset;
        window.scrollTo({ top: Math.max(targetTop, 0), behavior: "smooth" });

        mobileMenu.classList.remove('active');
        mobileToggle.setAttribute("aria-expanded", "false");
        history.replaceState(null, "", window.location.pathname + window.location.search);
      });
    });

    const setActiveSectionLink = () => {
      let currentId = "#home";

      trackedSections.forEach((section) => {
        const sectionTop = section.offsetTop - 140;
        if (window.scrollY >= sectionTop) {
          currentId = `#${section.id}`;
        }
      });

      sectionLinks.forEach((link) => {
        link.classList.toggle("active", link.getAttribute("href") === currentId);
      });
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("active");
        }
      });
    }, { threshold: 0.12 });

    document.querySelectorAll(".reveal").forEach((el) => observer.observe(el));
    window.addEventListener("scroll", setActiveSectionLink, { passive: true });
    setActiveSectionLink();
    </script>
@endpush
