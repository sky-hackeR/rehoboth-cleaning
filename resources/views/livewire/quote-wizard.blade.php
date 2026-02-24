<div>
    <style>
        :root {
            --primary-navy: #0a2540;
            --brand-green: #28a745;
            --soft-gray: #f8f9fa;
            --border-color: #e1e4e8;
        }

        .quote-wizard-wrapper .form-control {
            border-radius: 6px !important;
            border: 1px solid var(--border-color) !important;
            padding: 14px 18px !important;
            font-size: 15px;
            height: 50px !important;
            transition: all 0.2s ease-in-out;
            background-color: #fff !important;
        }

        .quote-wizard-wrapper select.form-control {
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%230a2540' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: calc(100% - 15px) center !important;
            background-size: 12px !important;
            padding-right: 40px !important;
            cursor: pointer;
        }
        
        .quote-wizard-wrapper .form-control:focus {
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1) !important;
            border-color: var(--brand-green) !important;
            outline: none !important;
        }

        .quote-wizard-wrapper .btn-main {
            padding: 15px 30px;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 800;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            transition: 0.3s;
            background: var(--primary-navy);
            color: white;
        }

        .quote-wizard-wrapper .btn-submit {
            background: var(--brand-green);
        }

        .quote-wizard-wrapper .btn-line {
            background: transparent;
            border: 1px solid #ddd;
            color: #666;
        }

        .review-box {
            background-color: var(--soft-gray);
            border-radius: 8px;
            border: 1px dashed var(--border-color);
            padding: 20px;
        }
        .review-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .review-item:last-child { border-bottom: none; }

        .ls-2 { letter-spacing: 2px; }
    </style>

    <div class="quote-wizard-wrapper p-4 bg-white shadow-sm rounded">
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="small text-uppercase fw-bold ls-2" style="color: var(--brand-green)">Step {{ $step }} of 3</span>
                <span class="small fw-bold text-dark">
                    @if($step == 1) Service Details @elseif($step == 2) Contact Information @else Review Estimate @endif
                </span>
            </div>
            <div class="progress" style="height: 6px; background: #eee; border-radius: 10px;">
                <div class="progress-bar" role="progressbar" 
                     style="width: {{ ($step / 3) * 100 }}%; transition: 0.6s cubic-bezier(0.4, 0, 0.2, 1); background-color: var(--primary-navy);">
                </div>
            </div>
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- STEP 1 --}}
        @if ($step == 1)
            <div class="row g-4">
                <div class="col-md-12 mb-2">
                    <h2 class="h4 mb-1 text-dark fw-bold">Project Scope</h2>
                    <p class="text-muted small">Select the appropriate service and facility size for your estimate.</p>
                </div>

                <div class="col-md-6">
                    <label class="small fw-bold text-uppercase ls-2 text-muted mb-2 d-block">Service Type</label>
                    <select wire:model="service_id" class="form-control">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label class="small fw-bold text-uppercase ls-2 text-muted mb-2 d-block">City/Location</label>
                    <select wire:model="location_id" class="form-control">
                        <option value="">Select Location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->city }}</option>
                        @endforeach
                    </select>
                    @error('location_id') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-12">
                    <label class="small fw-bold text-uppercase ls-2 text-muted mb-2 d-block">Facility Size</label>
                    <div class="input-group" style="display: flex; height: 50px; align-items: stretch;">
                        <input type="number" 
                               wire:model="sq_ft" 
                               class="form-control" 
                               placeholder="e.g. 5000" 
                               style="border-top-right-radius: 0 !important; border-bottom-right-radius: 0 !important; border-right: none !important; flex: 1; height: 100% !important;">
                        
                        <span class="input-group-text" 
                              style="height: 100%; background-color: var(--soft-gray); border: 1px solid var(--border-color); color: #6b7c93; font-weight: 700; font-size: 11px; padding: 0 20px; border-radius: 0 6px 6px 0 !important; text-transform: uppercase; display: flex; align-items: center; margin: 0;">
                            SQ. FT.
                        </span>
                    </div>
                    @error('sq_ft') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-12 mt-5">
                    <button wire:click="nextStep" class="btn-main w-100">
                        Next: Contact Details <i class="fa fa-chevron-right ms-2" style="font-size: 10px;"></i>
                    </button>
                </div>
            </div>
        @endif

        {{-- STEP 2 --}}
        @if ($step == 2)
            <div class="row g-4">
                <div class="col-md-12 mb-2">
                    <h2 class="h4 mb-1 text-dark fw-bold">Client Information</h2>
                    <p class="text-muted small">Your professional estimate will be delivered to this email address.</p>
                </div>

                <div class="col-md-12">
                    <label class="small fw-bold text-uppercase ls-2 text-muted mb-2 d-block">Full Name</label>
                    <input type="text" wire:model="customer_name" class="form-control" placeholder="Johnathan Doe">
                    @error('customer_name') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label class="small fw-bold text-uppercase ls-2 text-muted mb-2 d-block">Email Address</label>
                    <input type="email" wire:model="email" class="form-control" placeholder="j.doe@company.ca">
                    @error('email') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label class="small fw-bold text-uppercase ls-2 text-muted mb-2 d-block">Phone Number</label>
                    <input type="text" wire:model="phone" class="form-control" placeholder="+1 (---) --- ----">
                    @error('phone') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-12 d-flex gap-3 mt-5">
                    <button wire:click="previousStep" class="btn-main btn-line">
                        <i class="fa fa-chevron-left me-2" style="font-size: 10px;"></i> Back
                    </button>
                    <button wire:click="nextStep" class="btn-main flex-grow-1">
                        Review Quote <i class="fa fa-chevron-right ms-2" style="font-size: 10px;"></i>
                    </button>
                </div>
            </div>
        @endif

        {{-- STEP 3 --}}
        @if ($step == 3)
            <div class="row g-4">
                <div class="col-md-12 mb-2">
                    <h2 class="h4 mb-1 text-dark fw-bold">Review Your Estimate</h2>
                    <p class="text-muted small">Please confirm your details before submitting.</p>
                </div>

                <div class="col-md-12">
                    <div class="review-box">
                        <div class="review-item">
                            <span class="text-muted small fw-bold text-uppercase">Service</span>
                            <span class="fw-bold">{{ $selectedServiceName }}</span>
                        </div>
                        <div class="review-item">
                            <span class="text-muted small fw-bold text-uppercase">Location</span>
                            <span class="fw-bold">{{ $selectedLocationName }}</span>
                        </div>
                        <div class="review-item">
                            <span class="text-muted small fw-bold text-uppercase">Facility Size</span>
                            <span class="fw-bold">{{ number_format($sq_ft) }} SQ. FT.</span>
                        </div>
                        <div class="review-item">
                            <span class="text-muted small fw-bold text-uppercase">Contact</span>
                            <span class="fw-bold">{{ $customer_name }} ({{ $email }})</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 d-flex gap-3 mt-5">
                    <button wire:click="previousStep" class="btn-main btn-line">Back</button>
                    <button wire:click="submit" class="btn-main btn-submit flex-grow-1" wire:loading.attr="disabled">
                        <span wire:loading.remove>Submit Estimate Request</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>  