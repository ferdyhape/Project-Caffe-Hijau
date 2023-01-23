describe('dashboard scenario', () => {
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
    it('admin can access dashboard page', () => {
        cy.get(':nth-child(2) > .form-control').type('ferdyhahan5@gmail.com')
        cy.get(':nth-child(3) > .form-control').type('password')
        cy.get('.btn-primary').contains('Login').click()

        cy.url().should('contain', '/')
        cy.contains('Ferdy Hahan Pradana').click()
        cy.get('.dropdown-menu > :nth-child(1) > .dropdown-item').contains('Dashboard Admin').click()

        cy.get('#userDropdown > .me-3').contains('Welcome Back, Admin')
        cy.get('strong').contains('Ferdy Hahan Pradana')

        cy.get('.d-sm-flex > .d-none').contains('Generate Report')
        cy.get(':nth-child(1) > .card > .card-body > .row > .col > .text-xs').contains('Sum of Items')
        cy.get(':nth-child(2) > .card > .card-body > .row > .col > .text-xs').contains('Sum of Categories')
        cy.get(':nth-child(3) > .card > .card-body > .row > .col > .text-xs').contains('Sum of User')
        cy.get(':nth-child(4) > .card > .card-body > .row > .col > .text-xs').contains('Sum Of Banner')

        cy.url().should('contain', '/dashboard')
    })
})
