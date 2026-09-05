/**
 * Creative Tech Squad - Interactive Frontend Controller
 */
document.addEventListener('DOMContentLoaded', () => {
  // 1. Header scroll effect
  const header = document.querySelector('.site-header');
  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  // 2. Mobile Menu Toggle
  const mobileToggle = document.querySelector('.mobile-toggle');
  const navMenu = document.querySelector('.nav-menu');
  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', () => {
      navMenu.classList.toggle('open');
      const isOpen = navMenu.classList.contains('open');
      mobileToggle.setAttribute('aria-expanded', isOpen);
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
      if (!navMenu.contains(e.target) && !mobileToggle.contains(e.target) && navMenu.classList.contains('open')) {
        navMenu.classList.remove('open');
      }
    });
  }

  // 3. Dynamic Filter Tabs (Products, Portfolio, Blog)
  const filterTabs = document.querySelectorAll('.filter-tab');
  const filterItems = document.querySelectorAll('.filterable-item');

  filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      filterTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const filter = tab.getAttribute('data-filter');

      filterItems.forEach(item => {
        const itemCategory = item.getAttribute('data-category');
        if (filter === 'all' || itemCategory === filter || itemCategory?.toLowerCase() === filter?.toLowerCase()) {
          item.style.display = '';
          item.style.animation = 'fadeIn 0.4s ease';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  // 4. Modal Management
  window.openModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
  };

  window.closeModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.remove('open');
      document.body.style.overflow = '';
    }
  };

  // Close modals on backdrop click
  document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
    backdrop.addEventListener('click', (e) => {
      if (e.target === backdrop) {
        backdrop.classList.remove('open');
        document.body.style.overflow = '';
      }
    });
  });

  // 5. Toast alerts auto-dismiss
  const toasts = document.querySelectorAll('.toast');
  toasts.forEach(toast => {
    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(100%)';
      toast.style.transition = 'all 0.4s ease';
      setTimeout(() => toast.remove(), 400);
    }, 4500);
  });

  // 6. Interactive AI Workflow Simulation (for /ai page)
  const aiInput = document.getElementById('aiDemoInput');
  const aiSubmit = document.getElementById('aiDemoSubmit');
  const aiResponse = document.getElementById('aiDemoResponse');
  const aiSpinner = document.getElementById('aiDemoSpinner');

  if (aiSubmit && aiInput && aiResponse) {
    aiSubmit.addEventListener('click', () => {
      const query = aiInput.value.trim();
      if (!query) return;

      if (aiSpinner) aiSpinner.style.display = 'inline-block';
      aiResponse.innerHTML = '<span style="color:#64748B;">Processing with CTS Neural Pipeline...</span>';

      setTimeout(() => {
        if (aiSpinner) aiSpinner.style.display = 'none';
        
        let reply = "Creative Tech Squad provides tailored AI architectures with verified document citations, automated ETL extraction, and real-time enterprise connectors.";
        if (query.toLowerCase().includes('erp') || query.toLowerCase().includes('hrms')) {
          reply = "CTS Enterprise ERP AI Module: Analyzed shift attendance logs for 400+ employees. Identified 3 anomaly patterns in overtime calculation and generated automated payroll reconciliation ready for manager approval.";
        } else if (query.toLowerCase().includes('invoice') || query.toLowerCase().includes('document')) {
          reply = "DocIntel AI Engine: Successfully extracted Vendor: 'Apex Industrial', Invoice #INV-9421, Total: ₹1,48,500, Tax breakdown (CGST 9%, SGST 9%) and matched with Purchase Order #PO-883.";
        } else if (query.toLowerCase().includes('internship') || query.toLowerCase().includes('learn')) {
          reply = "CTS Education Lab: Our hands-on internship modules immerse students in modern Laravel 11, Java Spring Boot, Angular, and LLM application engineering with real codebase pull requests.";
        }

        aiResponse.innerHTML = `<strong>CTS AI Engine:</strong> ${reply}`;
      }, 700);
    });
  }
});
