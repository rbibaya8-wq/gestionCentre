@extends('layouts.app')

@section('content')
<div class="home-page">
    <!-- Hero Section with Background -->
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-crown"></i> Admin Portal
                </div>
                <h1 class="hero-title">
                    Welcome to Support Center
                </h1>
                <p class="hero-subtitle">
                    Complete Overtime Management System for Educational Excellence
                </p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">{{ $totalStudents ?? 0 }}</div>
                        <div class="stat-label">Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $totalTeachers ?? 0 }}</div>
                        <div class="stat-label">Teachers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $totalGroups ?? 0 }}</div>
                        <div class="stat-label">Groups</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $totalSubjects ?? 0 }}</div>
                        <div class="stat-label">Subjects</div>
                    </div>
                </div>
                <div class="hero-actions">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-user-graduate"></i> Manage Students
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-chart-pie"></i> View Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="container">
            <div class="section-header">
                <h2>System Features</h2>
                <p>Everything you need to manage your educational center efficiently</p>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Student Management</h3>
                        <p>Track student information, payments, attendance, and academic progress all in one place.</p>
                        <a href="{{ route('students.index') }}" class="feature-link">
                            Manage Students <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3>Teacher Oversight</h3>
                        <p>Manage teacher profiles, specializations, salaries, and assigned groups efficiently.</p>
                        <a href="{{ route('teachers.index') }}" class="feature-link">
                            Manage Teachers <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Group Organization</h3>
                        <p>Create and manage study groups, assign teachers, and track student enrollment.</p>
                        <a href="{{ route('groups.index') }}" class="feature-link">
                            Manage Groups <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3>Subject Management</h3>
                        <p>Organize subjects, link them to groups, and track subject-specific performance.</p>
                        <a href="{{ route('subjects.index') }}" class="feature-link">
                            Manage Subjects <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3>Payment Tracking</h3>
                        <p>Monitor student payments, generate receipts, and track monthly revenues.</p>
                        <a href="{{ route('students.index') }}" class="feature-link">
                            Track Payments <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Analytics Dashboard</h3>
                        <p>View comprehensive reports and analytics about your center's performance.</p>
                        <a href="{{ route('dashboard') }}" class="feature-link">
                            View Reports <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Call to Action -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Manage Your Center Efficiently?</h2>
                <p>Access all management features from your admin dashboard</p>
                <div class="cta-buttons">
                    <a href="{{ route('students.index') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-rocket"></i> Get Started
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-chart-bar"></i> View Analytics
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection