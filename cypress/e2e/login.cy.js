describe('login scenario', () => {
    beforeEach(() => {
        cy.on('uncaught:exception', (err) => {
            // returning false here prevents Cypress from
            // failing the test
            console.log('Cypress detected uncaught exception: ', err);
            return false;
        });
        cy.visit('/login')
    })

    //TC-001
    it('user can access login page', () => {
        cy.get('.h4').contains('Welcome Back!')
        cy.get(':nth-child(2) > .form-control').should('have.attr', 'placeholder', 'Email')
        // cy.get(':nth-child(3) > .form-control').should('have.attr', 'placeholder', 'Password')
        cy.get('.custom-control-label').contains('Remember Me')
        cy.get('.btn-primary').contains('Login').should('not.be.disabled')
        cy.get('.btn-google').contains('Login with Google').should('not.be.disabled')
        cy.get('.btn-facebook').contains('Login with Facebook').should('not.be.disabled')
        cy.get('.p-5 > :nth-child(4) > .small').contains('Forgot Password?')
        cy.get(':nth-child(5) > .small').contains('Create an Account!')
        cy.get('.d-none').should('be.visible')
    })

    //TC-002
    it('user can login using valid credentials', () => {
        cy.get(':nth-child(2) > .form-control').type('suyatno@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password')
        cy.get('.btn-primary').contains('Login').click()

        cy.url().should('contain', '/')
        cy.get('.active > .nav-link').contains('Home')
        cy.get('.navbar-nav > :nth-child(2) > .nav-link').contains('Our Products')
        cy.get(':nth-child(3) > .nav-link').contains('About Us')
        cy.get(':nth-child(4) > .nav-link').contains('Contact Us')
        cy.get('.border-0 > .nav-link').contains('Logout')
        cy.get('.latest-products > .container > .row > .col-md-12 > .section-heading > h2').contains('Latest Products')
        cy.get('.best-features > .container > .row > .col-md-12 > .section-heading > h2').contains('About Brownies Santri')
    })

    //TC-003
    it('user can not login using wrong password', () => {
        cy.get(':nth-child(2) > .form-control').type('suyatno@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password1')
        cy.get('.btn-primary').contains('Login').click()
        cy.get('.alert').contains('Login Failed')
    })

    //TC-004
    it('user can not login using wrong email', () => {
        cy.get(':nth-child(2) > .form-control').type('suyatno1@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password')
        cy.get('.btn-primary').contains('Login').click()
        cy.get('.alert').contains('Login Failed')
    })

    //TC-005
    it('user can not login using wrong email and password', () => {
        cy.get(':nth-child(2) > .form-control').type('suyatno1@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password1')
        cy.get('.btn-primary').contains('Login').click()
        cy.get('.alert').contains('Login Failed')
    })

    //TC-006
    it('admin can login using valid credentials', () => {
        cy.get(':nth-child(2) > .form-control').type('ferdyhahan5@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password')
        cy.get('.btn-primary').contains('Login').click()

        cy.url().should('contain', '/')
        cy.get('.active > .nav-link').contains('Home')
        cy.get('.navbar-nav > :nth-child(2) > .nav-link').contains('Our Products')
        cy.get(':nth-child(3) > .nav-link').contains('About Us')
        cy.get(':nth-child(4) > .nav-link').contains('Contact Us')
        cy.get('#navbarDropdown').contains('Ferdy Hahan Pradana')
        cy.get('.latest-products > .container > .row > .col-md-12 > .section-heading > h2').contains('Latest Products')
        cy.get('.best-features > .container > .row > .col-md-12 > .section-heading > h2').contains('About Brownies Santri')
        cy.contains('Ferdy Hahan Pradana').click()
        cy.get('.dropdown-menu > :nth-child(1) > .dropdown-item').contains('Dashboard Admin')
        cy.get('form > .dropdown-item').contains('Logout')
    })
})
