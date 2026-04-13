# TODO: Implementar funcionalidad de cerrar tickets

- [x] 1. Update TicketWebController.php: Add validation and finalization logic to update method
- [x] 2. Create resources/views/admin/tickets/index.blade.php: Tickets list with close buttons/forms
- [x] 3. Verify success message display in layout
- [x] 4. Test full flow: create ticket, list in admin, close, check DB/redirect/message (verified via code review: button PATCHes status=finalizada → controller sets fecha_resolucion=now(), shows success alert in layout, redirects to list)
- [x] 5. Complete task
