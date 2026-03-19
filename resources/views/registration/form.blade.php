<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Registration - NK EDUCATIF SPORTIF</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #FF7A59 0%, #1D5944 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #FF7A59 0%, #1D5944 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .loading {
            display: none;
            text-align: center;
            color: #667eea;
        }

        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-header h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>🏆 Sports Registration</h1>
            <p>Brings unity across Africa! Learn. Play. Grow</p>
        </div>

        <form id="registrationForm">
            <div class="form-group">
                <label for="sport_name">Select Sport *</label>
                <select id="sport_name" name="sport_name" required>
                    <option value="">-- Choose a Sport --</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport }}">{{ $sport }}</option>
                    @endforeach
                </select>
                <div class="error" id="sport_name_error"></div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="age_group">Age Group *</label>
                    <select id="age_group" name="age_group" required>
                        <option value="">-- Select Age Group --</option>
                        <option value="U18">U18 (Under 18)</option>
                        <option value="U20">U20 (Under 20)</option>
                        <option value="U25">U25 (Under 25)</option>
                        <option value="Senior">Senior (25+)</option>
                    </select>
                    <div class="error" id="age_group_error"></div>
                </div>

                <div class="form-group">
                    <label for="gender">Gender *</label>
                    <select id="gender" name="gender" required>
                        <option value="">-- Select Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="error" id="gender_error"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="position">Position (Optional)</label>
                    <input type="text" id="position" name="position" placeholder="e.g., Goalkeeper, Forward">
                    <div class="error" id="position_error"></div>
                </div>

                <div class="form-group">
                    <label for="jersey_number">Jersey Number (Optional)</label>
                    <input type="text" id="jersey_number" name="jersey_number" placeholder="e.g., 7">
                    <div class="error" id="jersey_number_error"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number (Optional)</label>
                <input type="tel" id="phone" name="phone" placeholder="Your phone number">
                <div class="error" id="phone_error"></div>
            </div>

            <div class="form-group">
                <label for="notes">Additional Notes (Optional)</label>
                <textarea id="notes" name="notes" placeholder="Tell us about yourself, your experience, or any special requirements..."></textarea>
                <div class="error" id="notes_error"></div>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                <span class="submit-text">Register Now</span>
                <span class="loading" id="loading">Registering...</span>
            </button>
        </form>
    </div>

    <!-- Success Popup Modal -->
    <div id="successModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center; z-index: 9999;">
        <div style="background: white; padding: 40px; border-radius: 15px; text-align: center; max-width: 400px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);">
            <div style="font-size: 50px; margin-bottom: 20px;">✅</div>
            <h2 style="color: #27ae60; margin-bottom: 15px; font-size: 24px;">Registration Successful!</h2>
            <p style="color: #666; margin-bottom: 25px; line-height: 1.6;">
                Thank you for registering! Your application has been submitted successfully. Our admin team will review your registration and contact you soon.
            </p>
            <button onclick="closeSuccessModal()" style="background: linear-gradient(135deg, #FF7A59 0%, #1D5944 100%); color: white; border: none; padding: 12px 30px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; width: 100%;">
                Close
            </button>
        </div>
    </div>

    <script>
        const form = document.getElementById('registrationForm');
        const submitBtn = document.getElementById('submitBtn');
        const successModal = document.getElementById('successModal');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Clear previous errors
            document.querySelectorAll('.error').forEach(el => el.style.display = 'none');

            // Show loading state
            submitBtn.disabled = true;
            document.querySelector('.submit-text').style.display = 'none';
            document.querySelector('.loading').style.display = 'inline';

            const formData = new FormData(form);

            try {
                const response = await fetch('{{ route("register.store") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Show success popup
                    showSuccessModal();
                    form.reset();
                } else {
                    alert('Registration failed: ' + (data.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            } finally {
                submitBtn.disabled = false;
                document.querySelector('.submit-text').style.display = 'inline';
                document.querySelector('.loading').style.display = 'none';
            }
        });

        function showSuccessModal() {
            const modal = document.getElementById('successModal');
            modal.style.display = 'flex';
        }

        function closeSuccessModal() {
            const modal = document.getElementById('successModal');
            modal.style.display = 'none';
            window.location.href = '/';
        }

        // Close modal when clicking outside
        document.getElementById('successModal').addEventListener('click', (e) => {
            if (e.target.id === 'successModal') {
                closeSuccessModal();
            }
        });
    </script>
</body>
</html>
