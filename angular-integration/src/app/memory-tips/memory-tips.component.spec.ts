import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MemoryTipsComponent } from './memory-tips.component';

describe('MemoryTipsComponent', () => {
  let component: MemoryTipsComponent;
  let fixture: ComponentFixture<MemoryTipsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [MemoryTipsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MemoryTipsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
