describe('template spec', () => {
  beforeEach(() => {
        cy.on('uncaught:exception', (err) => {
            // returning false here prevents Cypress from
            // failing the test
            console.log('Cypress detected uncaught exception: ', err);
            return false;
        });
        cy.visit('/')
        cy.contains('Login').click()
        cy.get(':nth-child(5) > .small').click()
        cy.url().should('contain', '/register')
    })

    //TC-001
    it('user can access register page', () => {
        cy.get('.user > :nth-child(2) > .form-control').should('have.attr', 'placeholder', 'Name')
        cy.get(':nth-child(3) > .form-control').should('have.attr', 'placeholder', 'Email')
        cy.get('.mb-3 > .form-control').should('have.attr', 'placeholder', 'Password')
        cy.get('.row > :nth-child(2) > .form-control').should('have.attr', 'placeholder', 'Repeat Password')
        cy.get('.btn-primary').contains('Register Account').should('not.be.disabled')
        cy.get('.btn-google').contains('Register with Google').should('not.be.disabled')
        cy.get('.btn-facebook').contains('Register with Facebook').should('not.be.disabled')
        cy.get(':nth-child(4) > .small').contains('Forgot Password?')
        cy.get(':nth-child(5) > .small').contains('Already have an account? Login!')
        cy.get('.d-none').should('be.visible')
    })
})
