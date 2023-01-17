describe('logout scenario', () => {
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
    it('user can logout', () => {
        cy.get(':nth-child(2) > .form-control').type('suyatno@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password')
        cy.get('.btn-primary').contains('Login').click()

        cy.url().should('contain', '/')
        cy.get('.border-0 > .nav-link').contains('Logout').click()

        cy.url().should('contain', '/')
        cy.get('#login-btn').contains('Login').should('not.be.disabled')
    })

    //TC-002
    it('admin can logout', () => {
        cy.get(':nth-child(2) > .form-control').type('ferdyhahan5@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password')
        cy.get('.btn-primary').contains('Login').click()

        cy.url().should('contain', '/')
        cy.contains('Ferdy Hahan Pradana').click()
        cy.get('form > .dropdown-item').contains('Logout').click()

        cy.url().should('contain', '/')
        cy.get('#login-btn').contains('Login').should('not.be.disabled')
    })
})
