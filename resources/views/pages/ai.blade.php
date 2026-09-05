@extends('layouts.app')

@section('title', 'AI Solutions & Document Intelligence — Creative Tech Squad')

@section('content')
<section class="hero-section" style="background:radial-gradient(circle at 50% 20%, rgba(17, 197, 232, 0.1) 0%, rgba(123, 44, 255, 0.06) 40%, transparent 70%);">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content">
    <span class="eyebrow" style="background:rgba(17, 197, 232, 0.15); color:#0284C7; border:1px solid rgba(17, 197, 232, 0.3);">
      CTS AI LAB
    </span>
    <h1 class="hero-title">Add True Intelligence to <br><span class="gradient-accent">Everyday Enterprise Operations.</span></h1>
    <p class="section-subtitle mx-auto">
      Move beyond generic chat wrappers. We architect verified Retrieval-Augmented Generation (RAG) knowledge systems, automated invoice document parsing, and predictive business alerts.
    </p>

    <div style="display:flex; justify-content:center; gap:16px;">
      <button onclick="openModal('projectInquiryModal')" class="btn btn-gradient btn-lg">
        Deploy Custom AI Workflow
      </button>
    </div>
  </div>
</section>

<!-- Interactive Live Demo & Dark AI Card -->
<section class="section" style="padding-top:0;">
  <div class="container">
    <div class="ai-dark-wrapper">
      <div class="ai-glow-bg"></div>
      <div class="grid grid-2" style="align-items:center; gap:40px; position:relative; z-index:1;">
        <div>
          <h2 style="font-size:2.2rem; color:white; margin-bottom:16px;">Test the CTS Semantic Pipeline</h2>
          <p style="color:#94A3B8; font-size:1rem; line-height:1.6; margin-bottom:24px;">
            Simulate how our vector embeddings and language pipelines respond to queries across ERP records, employee policies, or invoice data.
          </p>

          <div style="display:flex; flex-direction:column; gap:10px; margin-bottom:24px; font-size:0.9rem; color:#CBD5E1;">
            <div style="display:flex; align-items:center; gap:8px;">
              <span style="color:#11C5E8;">✓</span> Strict citation grounding — zero hallucinations on business records.
            </div>
            <div style="display:flex; align-items:center; gap:8px;">
              <span style="color:#11C5E8;">✓</span> Secure on-prem or isolated private cloud database storage.
            </div>
            <div style="display:flex; align-items:center; gap:8px;">
              <span style="color:#11C5E8;">✓</span> Sub-second response times with optimized indexing.
            </div>
          </div>
        </div>

        <div>
          <div style="background:rgba(13, 27, 46, 0.95); border:1px solid rgba(255, 255, 255, 0.15); border-radius:20px; padding:28px; box-shadow:0 20px 50px rgba(0,0,0,0.6);">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid rgba(255,255,255,0.08);">
              <div style="display:flex; align-items:center; gap:8px;">
                <div style="width:10px; height:10px; border-radius:50%; background:#10B981;"></div>
                <span style="font-size:0.85rem; font-weight:700; color:#E2E8F0;">DocIntel & ERP AI Engine</span>
              </div>
              <span style="font-size:0.75rem; color:#94A3B8; font-family:monospace;">LATENCY: 42ms</span>
            </div>

            <div id="aiDemoResponse" style="min-height:110px; font-size:0.95rem; color:#E2E8F0; line-height:1.6; margin-bottom:20px; background:rgba(0,0,0,0.3); padding:16px; border-radius:12px; border:1px solid rgba(255,255,255,0.05);">
              <em>Click any sample question or type your own business automation query below...</em>
            </div>

            <!-- Quick Questions -->
            <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:16px;">
              <button onclick="document.getElementById('aiDemoInput').value='How does AI parse supplier invoices?'; document.getElementById('aiDemoSubmit').click();" style="font-size:0.78rem; background:rgba(255,255,255,0.08); border:none; color:#94A3B8; padding:5px 10px; border-radius:6px; cursor:pointer;">
                "How does AI parse invoices?"
              </button>
              <button onclick="document.getElementById('aiDemoInput').value='How does AI optimize ERP payroll and attendance?'; document.getElementById('aiDemoSubmit').click();" style="font-size:0.78rem; background:rgba(255,255,255,0.08); border:none; color:#94A3B8; padding:5px 10px; border-radius:6px; cursor:pointer;">
                "AI in ERP payroll?"
              </button>
            </div>

            <div style="display:flex; gap:10px;">
              <input type="text" id="aiDemoInput" placeholder="Type a scenario (e.g. document extraction)..." style="flex:1; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); border-radius:10px; padding:12px 16px; color:white; font-size:0.92rem;">
              <button id="aiDemoSubmit" class="btn btn-gradient btn-sm">
                <span id="aiDemoSpinner" style="display:none;">⏳</span>
                Execute
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- AI Use Cases -->
<section class="section" style="background:var(--cts-white);">
  <div class="container">
    <div class="text-center" style="margin-bottom:50px;">
      <span class="eyebrow">Enterprise Solutions</span>
      <h2 class="section-title">Core AI Capabilities We Build</h2>
    </div>

    <div class="grid grid-3">
      <div class="card">
        <div style="font-size:2rem; margin-bottom:14px;">📄</div>
        <h3 style="font-size:1.3rem; margin-bottom:10px;">DocIntel OCR & Parsing</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem; line-height:1.6;">
          Automatically convert paper invoices, transport bills, and employee ID proofs into structured JSON database records with zero manual transcription errors.
        </p>
      </div>

      <div class="card">
        <div style="font-size:2rem; margin-bottom:14px;">🧠</div>
        <h3 style="font-size:1.3rem; margin-bottom:10px;">Enterprise RAG Knowledge</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem; line-height:1.6;">
          Equip your HR, support, and sales teams with an AI assistant trained strictly on your internal policies, standard operating procedures, and product manuals.
        </p>
      </div>

      <div class="card">
        <div style="font-size:2rem; margin-bottom:14px;">📈</div>
        <h3 style="font-size:1.3rem; margin-bottom:10px;">Predictive Operations</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem; line-height:1.6;">
          Identify attendance anomalies, inventory stockout risks, and project deadline bottlenecks before they impact delivery.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
