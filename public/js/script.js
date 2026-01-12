// Script principal pour PetShopPro

document.addEventListener('DOMContentLoaded', function() {
    
    // Gestion du panier
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Mettre à jour le compteur du panier
    function updateCartCount() {
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
        }
    }
    
    // Ajouter au panier
    document.addEventListener('click', function(e) {
        if (e.target.closest('.btn-add-cart')) {
            const button = e.target.closest('.btn-add-cart');
            const productId = button.getAttribute('data-product-id');
            
            // Trouver le produit
            const product = getProductById(productId);
            
            if (product) {
                addToCart(product);
                
                // Animation de confirmation
                button.innerHTML = '<i class="fas fa-check"></i> Ajouté !';
                button.style.background = '#28a745';
                
                setTimeout(() => {
                    button.innerHTML = '<i class="fas fa-cart-plus"></i> Ajouter';
                    button.style.background = '';
                }, 2000);
            }
        }
    });
    
    function getProductById(id) {
        // Cette fonction devrait normalement faire une requête API
        // Pour la démo, on cherche dans les données statiques
        const allProducts = [
            // Données des produits (copiées du modèle)
            {
                id: 1,
                name: 'Croquettes Premium Chien Adulte',
                price: 45.90,
                image_url: '/images/products/dog-food-1.jpg'
            },
            // ... autres produits
        ];
        
        return allProducts.find(p => p.id == id);
    }
    
    function addToCart(product) {
        const existingItem = cart.find(item => item.id === product.id);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                id: product.id,
                name: product.name,
                price: product.price,
                image: product.image_url,
                quantity: 1
            });
        }
        
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        
        // Notification toast
        showNotification(`${product.name} a été ajouté au panier !`);
    }
    
    function showNotification(message) {
        // Créer une notification toast
        const toast = document.createElement('div');
        toast.className = 'notification-toast';
        toast.innerHTML = `
            <div class="toast-content">
                <i class="fas fa-check-circle"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        // Ajouter du style
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            animation: slideIn 0.3s ease;
        `;
        
        // Supprimer après 3 secondes
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
    
    // Recherche en temps réel
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            // Pour la V1 statique, on peut filtrer côté client
            // Dans la V2, on fera une requête AJAX
            if (searchTerm.length > 2) {
                // Implémentation de la recherche
                console.log('Recherche pour:', searchTerm);
            }
        });
    }
    
    // Filtres
    document.querySelectorAll('.filter-category').forEach(btn => {
        btn.addEventListener('click', function(e) {
            document.querySelectorAll('.filter-category').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Animation au scroll
    function animateOnScroll() {
        const elements = document.querySelectorAll('.fade-in');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    }
    
    // Initialiser les animations
    document.querySelectorAll('.fade-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });
    
    // Initialiser le compteur du panier
    updateCartCount();
    
    // Écouter le scroll
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Exécuter une première fois
});